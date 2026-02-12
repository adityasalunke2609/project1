<?php

namespace App\Http\Controllers;

use App\Models\tbl_product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = tbl_product::all();

        return view('admin.pages.product.index', compact('product'));
    }

    public function store(Request $request)
    {
        $product = new tbl_product;
        $product->product_name = $request->productName;
        $product->product_hsncode = $request->hsnCode;
        $product->product_weight = $request->productWeight;
        $product->product_caterogy_id = $request->productCategoryName;
        $product->product_subcaterogy_id = $request->productSubCategoryName;
        $product->product_tax = $request->productTax;
        $product->product_unit = $request->productUnit;
        $product->product_bar_code = $request->barcode;
        $product->product_qrcode = $request->qrcode;
        $product->product_unique_code = $request->unique_code;
        $product->product_mrp = $request->mrp;
        $product->product_sale = $request->sale_price;
        $product->product_purchase = $request->purchase_price;
        $product->product_wholesale = $request->wholesale_price;
        $product->product_distributor = $request->distributor_price;
        $product->product_op_qty = $request->opening_qty;
        $product->product_op_value = $request->opening_value;
        $product->save();

        return redirect('/admin/product');
    }

    public function remove(Request $request)
    {
        $product = tbl_product::find($request->product_id);
        $product->delete();

        return redirect('/admin/product');
    }

    public function edit(Request $request)
    {
        $product = tbl_product::find($request->unit_id);
        $product->product_name = $request->productName;
        $product->product_hsncode = $request->hsnCode;
        $product->product_weight = $request->productWeight;
        $product->product_caterogy_id = $request->productCategoryName;
        $product->product_subcaterogy_id = $request->productSubCategoryName;
        $product->product_tax = $request->productTax;
        $product->product_unit = $request->productUnit;
        $product->product_bar_code = $request->barcode;
        $product->product_qrcode = $request->qrcode;
        $product->product_unique_code = $request->unique_code;
        $product->product_mrp = $request->mrp;
        $product->product_sale = $request->sale_price;
        $product->product_purchase = $request->purchase_price;
        $product->product_wholesale = $request->wholesale_price;
        $product->product_distributor = $request->distributor_price;
        $product->product_op_qty = $request->opening_qty;
        $product->product_op_value = $request->opening_value;
        $product->save();

        return redirect('/admin/product');
    }
}
