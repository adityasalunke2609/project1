<?php

namespace App\Http\Controllers;

use App\Models\tbl_subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
  
    function index()
    {
        $subcategory = tbl_subcategory::all();
        return view("admin.pages.subcategory.index", compact("subcategory"));
    }

    function store(Request $request)
    {
        $subcategory = new tbl_subcategory();
        $subcategory->id= $request->
        $subcategory->subcategory_name = $request->SubCategoryName;
        $subcategory->subcategory_image = "";
        $subcategory->save();
        return redirect("/admin/store");
    }
}

