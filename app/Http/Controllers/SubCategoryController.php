<?php

namespace App\Http\Controllers;

use App\Models\tbl_subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
  
    function subcategory()
    {
        $subcategory = tbl_subcategory::all();
        return view("admin.pages.subcategory.index", compact("subcategory"));
    }

    function storecategory(Request $request)
    {
        $subcategory = new tbl_subcategory();
        $subcategory->id= $request->
        $subcategory->subcategory_name = $request->SubCategoryName;
        $subcategory->subcategory_image = "";
        $subcategory->save();
        return redirect("/subcategory");
    }
}

