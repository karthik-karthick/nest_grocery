<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function brands()
    {
        return view('admin.brand.add_brand');
    }
    public function add_brand(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'brand_name' => 'required|string|unique:brands',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Check if a brand ID is provided
            if ($request->filled('brand_id')) {
                $brand = Brand::findOrFail($request->brand_id);

                // Check if a new brand image is uploaded
                if ($request->hasFile('brand_image')) {
                    // Delete the old image if it exists
                    if (file_exists($brand->brand_image)) {
                        unlink($brand->brand_image);
                    }

                    // Upload and save the new image
                    $image = $request->file('brand_image');
                    $hashedName = $image->hashName();
                    $path = $image->move('Admin Images/brand/images', $hashedName);
                    $brand->brand_image = $path;
                }
            } else {
                if ($request->hasFile('brand_image')) {
                    $image = $request->file('brand_image');
                    $hashedName = time() . '.' . $image->getClientOriginalExtension();
                    $path = $image->move('admin/assets/images/brand/images', $hashedName);
                } else {
                    throw new \Exception('No image provided.');
                }

                $brand = new Brand();
                $brand->brand_image = $path;
            }

            $brand->brand_name = $request->brand_name;
            $brand->save();
            $message = $request->filled('brand_id') ? 'Brand updated successfully' : 'Brand added successfully';

            return redirect()->back()->with('success', $message);
        } catch (\Exception $e) {
            return view('admin.contents.error')->with('error', $e->getMessage());
        }
    }

    public function getBrands()
    {

        $brands = Brand::select(['id', 'brand_name', 'brand_image', 'status'])->get();

        return datatables()->of($brands)
            ->addColumn('action', function ($row) {
                $html = '<a class="edit-brand" data-id="' . $row->id . '" href="#"><i class="bx bx-pencil text-primary fs-4 me-3"></i></a>';
                $html .= '<a class="delete-brand-btn" onclick="delbrand()" data-url="' . route('del.brand') . '" data-id="' . $row->id . '" href="#"><i class="bx bx-trash-alt text-danger fs-4 ms-3"></i></a>';
                return $html;
            })
            ->toJson();
    }
    public function getBrand(Request $request)
    {
        $brand = Brand::find($request->id);

        return response()->json($brand);
    }
    public function del_brand(Request $request)
    {
        $request->validate([
            'brand_id' => 'required',
        ]);

        if (Product::where('brand_id', $request->brand_id)->exists()) {
            $message = 'Brand is already in use in Product and cannot be Deleted.';
            return response()->json(['error' => false, 'message' => $message], 422);
        }

        $brand = Brand::find($request->brand_id);
        $brand->delete();
        $message = 'Brand deleted successfully';
        return response()->json(['success' => true, 'message' => $message], 200);
    }

    public function change_status(Request $request)
    {
        $request->validate([
            'status_update' => 'required|in:0,1',
            'brand_id' => 'required',
        ]);
        if (Product::where('brand_id', $request->brand_id)->exists()) {
            $message = 'Brand is already in use in Product and cannot be updated.';
            return response()->json(['error' => false, 'message' => $message], 422);
        }
        $brand = Brand::findOrFail($request->brand_id);

        $brand->status = $request->status_update;
        $brand->save();

        $message = 'status changed successfully';
        return response()->json(['success' => true, 'message' => $message], 200);
    }
}
