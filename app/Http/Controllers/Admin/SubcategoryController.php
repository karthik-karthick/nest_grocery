<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubcategoryController extends Controller
{
    public function subcategory_list(Request $request)
    {
        $category = Category::where('status', 1)->get();
        return view('admin.product.sub_category', compact('category'));
    }
    public function getsubCategories()
    {
        $subcategories = Subcategory::with('category:id,category_name')
            ->select(['id', 'category_id', 'subcategory_name', 'subcategory_image', 'code', 'status'])
            ->get();
        // dd($subcategories);
        return datatables()->of($subcategories)
            ->addColumn('action', function ($row) {
                $html = '<a class="edit-subcategory" data-id="' . $row->id . '"href="#"><i class="bx bx-pencil text-primary fs-4 me-3"></i></a>';
                $html .= '<a class="delete-subcategory-btn" onclick = "del_subcategory()" data-url="' . route('del.subcategory') . '" data-id="' . $row->id . '" href="#"><i class= "bx bx-trash-alt text-danger fs-4 ms-3"></i></a>';
                return $html;
            })
            ->toJson();
    }

    public function add_subcategory(Request $request)
    {
        try {
            // If updating, get the subcategory being updated
            $subcategory = null;
            if ($request->filled('subcategory_id')) {
                $subcategory = Subcategory::findOrFail($request->subcategory_id);
            }

            // Set unique validation rule for the 'code' field
            $uniqueCodeRule = 'unique:subcategories';
            if ($subcategory) {
                $uniqueCodeRule .= ',code,' . $subcategory->id;
            }

            // Validate request data
            $validator = Validator::make($request->all(), [
                'category_id' => 'required|numeric',
                'subcategory_name' => 'required|string',
                'code' => ['required', $uniqueCodeRule],
            ], [
                'category_id.numeric' => 'category field is required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Image validation if present
            if ($request->hasFile('subcategory_image')) {
                $validator = Validator::make($request->all(), [
                    'subcategory_image' => 'image|mimes:jpeg,png,bmp,gif,svg|max:2048',
                ], [
                    'subcategory_image.image' => 'The subcategory image must be an image file.',
                    'subcategory_image.mimes' => 'The subcategory image must be a file of type: jpeg, png, bmp, gif, svg.',
                    'subcategory_image.max' => 'The subcategory image must not be larger than 2MB.',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                // Delete old image if it exists
                if ($subcategory && $subcategory->subcategory_image) {
                    $oldImagePath = public_path($subcategory->subcategory_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $image = $request->file('subcategory_image');
                $hashedName = $image->hashName();
                $path = $image->move('admin/assets/images/subcategory/images', $hashedName);
            } else {
                // If no new image provided, keep the old one
                $path = $subcategory ? $subcategory->subcategory_image : null;
            }

            if (!$subcategory) {
                $subcategory = new Subcategory();
            }
            $subcategory->category_id = $request->category_id;
            $subcategory->subcategory_name = $request->subcategory_name;
            $subcategory->code = strtoupper($request->code);
            $subcategory->subcategory_image = $path;
            $subcategory->save();

            $message = $request->filled('subcategory_id') ? 'Subcategory updated successfully' : 'Subcategory added successfully';

            return redirect()->back()->with('success', $message);
        } catch (\Exception $e) {
            return view('admin.contents.error')->with('error', $e->getMessage());
        }
    }


    public function getSubcategory(Request $request)
    {
        $subcategory = Subcategory::find($request->id);
        return response()->json($subcategory);
    }

    public function del_subcategory(Request $request)
    {
        $request->validate([
            'subcategory_id' => 'required',
        ]);
        if (Product::where('subcategory_id', $request->subcategory_id)->exists()) {
            $message = 'Subcategory is already in use in Product and cannot be Deleted.';
            return response()->json(['error' => false, 'message' => $message], 422);
        }
        $subcategory = Subcategory::find($request->subcategory_id);
        $subcategory->delete();
        $message = 'subcategory deleted successfully';
        return response()->json(['success' => true, 'message' => $message], 200);
    }
    public function change_status(Request $request)
    {
        $request->validate([
            'status_update' => 'required|in:0,1',
            'subcategory_id' => 'required',
        ]);

        if (Product::where('subcategory_id', $request->subcategory_id)->exists()) {
            $message = 'Subategory is already in use in Product and cannot be updated.';
            return response()->json(['error' => false, 'message' => $message], 422);
        }

        $category = Subcategory::findOrFail($request->subcategory_id);

        $category->status = $request->status_update;
        $category->save();

        $message = 'status changed successfully';
        return response()->json(['success' => true, 'message' => $message], 200);
    }
}
