<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function in_stock()
    {
        return view('admin.reports.in_stock');
    }

    public function out_of_stock()
    {
        return view('admin.reports.out_of_stock');
    }

    public function get_in_stock()
    {
        $products = Product::with('category', 'subcategory')
            ->where('current_stock', '>', 0)
            ->orderBy('current_stock', 'ASC')
            ->select('products.*')
            ->get();

        return datatables()->of($products)
            ->addColumn('action', function ($row) {
                $html = '<form action="' . route('edit.stock', ['id' => $row->id]) . '" method="POST">';
                $html .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
                $html .= '<input type="number" name="quantity" value="' . $row->current_stock . '" min="0">';
                $html .= '<button type="submit" class="btn btn-primary btn-sm ms-3">Submit</button>';
                $html .= '</form>';
                return $html;
            })

            ->toJson();
    }
    public function edit_stock(Request $request, $id)
    {
        try {
            $product = Product::where('id', $id)->first();
            $product->current_stock = $request->quantity;
            $product->update();
            return redirect()->back()->with('success', 'Product Stock Changed Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function get_outof_stock()
    {
        $products = Product::with('category', 'subcategory')
            ->where('current_stock', 0)
            ->orderBy('current_stock', 'desc')
            ->select('products.*')
            ->get();
        return datatables()->of($products)
            ->addColumn('action', function ($row) {
                $html = '<form action="' . route('edit.stock', ['id' => $row->id]) . '" method="POST">';
                $html .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
                $html .= '<input type="number" name="quantity" value="' . $row->current_stock . '" min="1">';
                $html .= '<button type="submit" class="btn btn-primary btn-sm ms-3">Submit</button>';
                $html .= '</form>';
                return $html;
            })
            ->toJson();
    }
}
