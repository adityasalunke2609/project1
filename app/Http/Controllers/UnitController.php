<?php

namespace App\Http\Controllers;

use App\Models\tbl_unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    function unit()
    {
        $unit = tbl_unit::all();
        return view("admin.pages.unit.index",compact('unit'));
    }

    function storeunit(Request $request)
    {
        $unit=new tbl_unit();
        $unit->unit_name=$request->unitName;
        $unit->save();
        return redirect("/unit");
    }
}