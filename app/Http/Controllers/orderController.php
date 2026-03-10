<?php

namespace App\Http\Controllers;

use App\Models\tbl_order_child;
use App\Models\tbl_order_master;
use Illuminate\Http\Request;
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

    public function remove(Request $request)
    {
        $orderMaster = tbl_order_master::find($request->order_master_id);
        $orderChild = tbl_order_child::where('order_child_master_id', $request->order_master_id)->get();
        foreach ($orderChild as $child) {
            $child->delete();
        }
        $orderMaster->delete();

        return redirect('admin/order')->with('delete', 'Order Deleted Successfully');
    }


    public function edit(Request $request)
    {
        $orderMaster = tbl_order_master::find($request->order_master_id);
        // $orderMaster->order_master_user_id = $request->name;
        
        // $orderMaster->order_master_total = $request->total_amount;

        $orderMaster->order_master_payment_status = $request->payment_status;
        $orderMaster->order_master_payment_mode = $request->payment_mode;
        $orderMaster->order_master_status = $request->order_status;
        $orderMaster->save();

        return redirect('admin/order')->with('success', 'Order Updated Successfully');
    }




    public function vieworder($id)
    {
        $orderMaster = DB::table('tbl_order_master')
            ->join('users', 'tbl_order_master.order_master_user_id', '=', 'users.id')
            ->where('tbl_order_master.order_master_id', $id)
            ->select(
                'tbl_order_master.*',
                'users.*'
            )
            ->first();

        $orderChild = DB::table('tbl_order_child')
            ->join('tbl_product', 'tbl_order_child.order_child_product_id', '=', 'tbl_product.product_id')
            ->where('tbl_order_child.order_child_master_id', $id)
            ->select(
                'tbl_order_child.*',
                'tbl_product.*'
            )
            ->get();

        return view('admin.pages.order.view', compact('orderMaster', 'orderChild'));
    }
}
