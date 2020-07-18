<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
    	$data['orders'] = Order::all();
    	return view('admin.orders.index', $data);
    }

    public function orderDetails($order_number)
    {
    	$data['order'] = Order::where('order_number', $order_number)->firstOrFail();
    	return view('admin.orders.details', $data);
    }

    
}
