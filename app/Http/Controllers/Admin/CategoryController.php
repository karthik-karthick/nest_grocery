<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function category()
    {
        return view('admin.product.category');
    }
    public function add_category(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'category_name' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $category = null;

            if ($request->filled('category_id')) {
                $category = Category::findOrFail($request->category_id);
            }

            if ($request->hasFile('category_image')) {
                $validator = Validator::make($request->all(), [
                    'category_image' => 'required|image|max:2048|mimes:jpeg,png,gif,svg',
                ], [
                    'category_image.max' => 'The category image must not be larger than 2MB.',
                    'category_image.required' => 'Category image field is required.',
                    'category_image.image' => 'The category image must be an image file.',
                    'category_image.mimes' => 'The category image must be a file of type: jpeg, png, gif, svg.',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                // Delete old image if it exists
                if ($category && $category->category_image) {
                    $oldImagePath = public_path($category->category_image);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }

                $image = $request->file('category_image');
                $hashedName = $image->hashName();
                $path = $image->move('admin/assets/images/category/images', $hashedName);
            } else {
                $path = $category ? $category->category_image : null;
            }

            if (!$category) {
                $category = new Category();
            }

            $category->category_name = $request->category_name;
            $category->category_image = $path;
            $category->save();

            $message = $request->filled('category_id') ? 'Category updated successfully' : 'Category added successfully';

            return redirect()->back()->with('success', $message);
        } catch (\Exception $e) {
            return view('admin.contents.error')->with('error', $e->getMessage());
        }
    }

    public function get_category(Request $request)
    {
        $categories = Category::select(['id', 'category_name', 'category_image', 'status'])->get();

        return datatables()->of($categories)
            ->addColumn('action', function ($row) {
                $html = '<a class="edit-category" data-id="' . $row->id . '" href="javascript:;"><i class="bx bx-pencil text-primary fs-4 me-3"></i></a>';
                $html .= '<a class="delete-category-btn ms-3" onclick = "del_category()" data-url="' . route('del.category') . '" data-id="' . $row->id . '" href="javascript:;"><i class="bx bx-trash-alt text-danger fs-4 ms-3"></i></a>';
                return $html;
            })
            ->toJson();
    }
    public function get_category_id(Request $request)
    {
        $category = Category::find($request->id);
        return response()->json($category);
    }

    public function change_status(Request $request)
    { {
            $request->validate([
                'status_update' => 'required|in:0,1',
                'category_id' => 'required',
            ]);
            if (Subcategory::where('category_id', $request->category_id)->exists()) {
                $message = 'Category is already in use in subcategories and cannot be updated.';
                return response()->json(['error' => false, 'message' => $message], 422);
            }
            $category = Category::findOrFail($request->category_id);

            $category->status = $request->status_update;
            $category->save();

            $message = 'status changed successfully';
            return response()->json(['success' => true, 'message' => $message], 200);
        }
    }
    public function del_category(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
        ]);

        if (Subcategory::where('category_id', $request->category_id)->exists()) {
            $message = 'Category is already in use in subcategories and cannot be Deleted.';
            return response()->json(['error' => false, 'message' => $message], 422);
        }

        $category = Category::find($request->category_id);
        $category->delete();
        $message = 'Category deleted successfully';
        return response()->json(['success' => true, 'message' => $message], 200);
    }
}
