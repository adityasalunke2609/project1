<?php

namespace App\Http\Controllers;

use App\Models\tbl_unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $unit = tbl_unit::all();

        return view('admin.pages.unit.index', compact('unit'));
    }

    public function store(Request $request)
    {
        $unit = new tbl_unit;
        $unit->unit_name = $request->unitName;
        $unit->save();

        return redirect('/admin/unit')->with("success","Unit Add Successfully");;
    }

    public function remove(Request $request)
    {
        $unit = tbl_unit::find($request->unit_id);
        $unit->delete();

        return redirect('/admin/unit')->with("delete","Unit delete Successfully");;
    }

    public function edit(Request $request)
    {
        $unit = tbl_unit::find($request->unit_id);
        $unit->unit_name = $request->unitName;
        $unit->save();
        return redirect('/admin/unit')->with("success"," Unit update Successfully");;
    }
}


