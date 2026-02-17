<?php

namespace App\Http\Controllers;

use App\Models\tbl_category;
use App\Models\tbl_subcategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function index()
    {
        $subcategory = tbl_subcategory::all();
        $category = tbl_category::all();

        return view('admin.pages.subcategory.index', compact('subcategory', 'category'));
    }

    public function store(Request $request)
    {
     
        $subcategory = new tbl_subcategory;
        $path = public_path('uploads/subcategory');
        $subCategoryImage=$request->file('SubCategoryImage');
        $subCategoryImageName="";
        if($subCategoryImage){
            $subCategoryImageName= time()."subCategoryImage.png";
            $subCategoryImage->move($path,$subCategoryImageName);
        }

        $subcategory->subcategory_name = $request->SubCategoryName;
        $subcategory->categoty_id = $request->categoryName;
        $subcategory->subcategory_image = $subCategoryImageName;
        $subcategory->save();

        return redirect('/admin/subcategory');
    }

    public function remove(Request $request)
    {
        $subcategory = tbl_subcategory::find($request->subcategory_id);
        $subcategory->delete();
        return redirect('/admin/subcategory');
    }
}
