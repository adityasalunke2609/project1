<?php

namespace App\Http\Controllers;

use App\Models\tbl_tax;
use App\Models\tbl_unit;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    function index()
    {
         $tax = tbl_tax::all();
        return view("admin.pages.tax.index",compact('tax'));
    }

     function store(Request $request)
    {
        $tax=new tbl_tax();
        $tax->tax_name=$request->taxName;
        $tax->tax_percentage=$request->taxPercentage;
        $tax->save();
        return redirect("/admin/tax");
    }
}

