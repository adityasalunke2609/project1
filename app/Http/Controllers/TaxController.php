<?php

namespace App\Http\Controllers;

use App\Models\tbl_tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function index()
    {
        $tax = tbl_tax::all();

        return view('admin.pages.tax.index', compact('tax'));
    }

    public function store(Request $request)
    {
        $tax = new tbl_tax;
        $tax->tax_name = $request->taxName;
        $tax->tax_percentage = $request->taxPercentage;
        $tax->save();

        return redirect('/admin/tax')->with("success","tax Add Successfully");;
    }

    public function remove(Request $request)
    {
        $tax = tbl_tax::find($request->tax_id);
        $tax->delete();

        return redirect('/admin/tax')->with("delete","tax remove Successfully");;
    }

    public function edit(Request $request)
    {
        $tax = tbl_tax::find($request->tax_id);
        $tax->tax_name = $request->taxName;
        $tax->tax_percentage = $request->taxPercentage;
        $tax->save();

        return redirect('/admin/tax')->with("success","tax update Successfully");;
    }
}
