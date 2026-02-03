<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnitController extends Controller
{
    function unit()
    {
        return view("admin.pages.unit.index");
    }
}