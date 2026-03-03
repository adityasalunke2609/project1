<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class orderController extends Controller
{
    public function index()
    {
        $order = DB::table('tbl_order_master')
            ->join('users', 'tbl_order_master.order_master_user_id', '=', 'users.id')
            ->select(
                'tbl_order_master.*',
                'users.name'
            )
            ->get();

        return view('admin.pages.order.index', compact('order'));
    }
}
