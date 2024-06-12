<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;




class OrdersController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->with('orderItems.product')->get();

        return view('orders.index', compact('orders'));
    }
}   
