<?php

namespace App\Http\Controllers;

use App\Models\tbl_order_master;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function index()
    {
        $order = tbl_order_master::get();
        
        return view('admin.pages.order.index', compact('order'));
    }

    
}
