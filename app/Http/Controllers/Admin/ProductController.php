<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function add_product()
    {
        $colors = Color::all();
        $category = Category::where('status', '1')->get();
        $brands = Brand::where('status', 1)->get();
        return view('admin.product.add_product', compact('category', 'colors', 'brands'));
    }
    public function product_list()
    {
        return view('admin.product.product_list');
    }
    public function getproducts()
    {
        $products = Product::with('category', 'subcategory')
            ->select(['products.*'])
            ->get();

        return datatables()->of($products)

            ->addColumn('action', function ($row) {
                $html = '<a class="me-2" href="' . route('edit.product', ['id' => $row->id]) . '"><i class="bx bx-pencil text-primary fs-4 "></i></a>';
                $html .= '<a class="delete-product-btn ms-2" onclick="delproduct()" data-url="' . route('del.product') . '" data-id="' . $row->id . '" href="#"><i class= "bx bx-trash-alt text-danger fs-4 ms-3"></i></a>';
                return $html;
            })
            ->toJson();
    }

    public function product_submit(Request $request)
    {
        // dd($request->input());

        try {
            $rules = [
                'product_name' => 'required|string|max:255',
                'category_id' => 'required|numeric',
                'brand_id' => 'required|numeric',
                'subcategory_id' => 'required|numeric',
                'tag_name' => 'required|string|max:255',
                'colors' => 'required|array', // Ensure color is an array
                // Ensure each color value is a string
                'current_stock' => 'required|numeric',
                'sku' => 'required|string|max:255',
                'mrp_price' => 'required|numeric',
                'selling_price' => 'required|numeric',
                'shiping_price' => 'required|numeric',
                'preorder_description' => 'required|string',
                'short_description' => 'required|string',
                'product_thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Updated rule for image
            ];

            // Custom error messages
            $messages = [
                'category_id.required' => 'Category field is required',
                'category_id.numeric' => 'Category field must be numeric',
                'subcategory_id.required' => 'Subcategory field is required',
                'subcategory_id.numeric' => 'Subcategory field must be numeric',
                'product_thumbnail.max' => 'The Product image must not be larger than 2MB.',
                'product_thumbnail.image' => 'The Product image must be an image file.',
                'product_thumbnail.mimes' => 'The Product image must be a file of type: jpeg, png, gif, svg.',
            ];

            // Apply validation rules and custom messages
            $validator = Validator::make($request->all(), $rules, $messages);

            // Check if validation fails
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            // Prepare the data for saving
            $data = [
                'product_name' => $request->product_name,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'tag_name' => $request->tag_name,
                'color_id' => implode(',', $request->colors), // Save color as JSON
                'current_stock' => $request->current_stock,
                'sku' => $request->sku,
                'brand_id' => $request->brand_id,
                'product_price' => $request->mrp_price,
                'selling_price' => $request->selling_price,
                'shipping_price' => $request->shiping_price,
                'preorder_description' => $request->preorder_description,
                'short_description' => $request->short_description,
            ];

            // Check if product_id is provided (indicating an update request)
            if ($request->product_id != null) {

                $product = Product::findOrFail($request->product_id);
                // dd('hii');
                // Check if a new image is uploaded
                if ($request->hasFile('product_thumbnail')) {
                    // Delete the old image
                    if (file_exists($product->product_image)) {
                        unlink($product->product_image);
                    }

                    // Upload and save the new image
                    $image = $request->file('product_thumbnail');
                    $hashedName = $image->hashName();
                    $path = $image->move('admin/assets/images/product/images', $hashedName);
                    $data['product_image'] = $path;
                }

                // Update product data
                $product->update($data);
            } else {
                // Handle adding a new product
                $image = $request->file('product_thumbnail');
                $hashedName = $image->hashName();
                $path = $image->move('admin/assets/images/product/images', $hashedName);

                $data['product_image'] = $path;

                // Create a new product
                $product = Product::create($data);
            }

            // Redirect with success message
            return redirect()->back()->with('success', $request->product_id != null ? 'Product Updated Successfully' : 'Product Added Successfully');
        } catch (\Exception $e) {
            // Redirect back with error message
            return view('admin.contents.error')->with('error', $e->getMessage());
        }
    }

    public function getSubcategories(Request $request)
    {
        $categoryId = $request->input('category_id');
        $subcategories = Subcategory::where('category_id', $categoryId)->pluck('subcategory_name', 'id');

        return response()->json($subcategories);
    }

    public function getSubcategorySku(Request $request)
    {
        $subcategoryId = $request->input('subcategory_id');
        $subcategory = Subcategory::find($subcategoryId);
        if ($subcategory) {
            return response()->json(['sku' => $subcategory->code]);
        } else {
            return response()->json(['error' => 'Subcategory not found'], 404);
        }
    }
    public function edit_product($id)
    {
        try {
            $category = Category::all();
            $subcategories = Subcategory::all();
            $brands = Brand::all();
            $product = Product::find($id);
            $colors = Color::all();
            return view('admin.product.edit_product', compact('product', 'category', 'brands', 'colors', 'subcategories'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function del_product(Request $request)
    {
        try {
            $product_id = $request->product_id;
            $product = Product::find($product_id);
            $product->delete();
            $message = 'Product deleted successfully';
            return response()->json(['success' => true, 'message' => $message], 200);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
