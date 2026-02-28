<?php

namespace App\Http\Controllers;

use App\Models\tbl_category;
use App\Models\tbl_subcategory;
use DB;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategory = DB::table('tbl_subcategory')
            ->join('tbl_category', 'tbl_subcategory.category_id', '=', 'tbl_category.category_id')
            ->select('tbl_subcategory.*', 'tbl_category.category_name')
            ->get();
        $category = tbl_category::all();

        return view('admin.pages.subcategory.index', compact('subcategory', 'category'));
    }

    public function store(Request $request)
    {

        $subcategory = new tbl_subcategory;
        $path = public_path('uploads/subcategory');
        $subCategoryImage = $request->file('SubCategoryImage');
        $subCategoryImageName = '';
        if ($subCategoryImage) {
            $subCategoryImageName = time().'subCategoryImage.png';
            $subCategoryImage->move($path, $subCategoryImageName);
        }

        $subcategory->subcategory_name = $request->SubCategoryName;
        $subcategory->category_id = $request->categoryName;
        $subcategory->subcategory_image = $subCategoryImageName;
        $subcategory->save();

        return redirect('/admin/subcategory')->with("success","SubCategory Add Successfully");
    }

    public function edit(Request $request)
    {
        
        $subcategory = tbl_subcategory::find($request->subcategory_id);

        $path = public_path('uploads/subcategory');
      
        $subCategoryImage = $request->file('SubCategoryImage');
        $subCategoryImageName = '';
        if ($subCategoryImage) {
            $subCategoryImageName = time().'subCategoryImage.png';
            $subCategoryImage->move($path, $subCategoryImageName);
            $subcategory->subcategory_image = $subCategoryImageName;
        }

        $subcategory->subcategory_name = $request->SubCategoryName;
        $subcategory->category_id = $request->categoryName;
        $subcategory->save();

        return redirect('/admin/subcategory')->with("success","SubCategory Update Successfully");
    }


    public function remove(Request $request)
    {
        $subcategory = tbl_subcategory::find($request->subcategory_id);
        $subcategory->delete();

        return redirect('/admin/subcategory')->with("delete","SubCategory deleted Successfully");
    }
}
