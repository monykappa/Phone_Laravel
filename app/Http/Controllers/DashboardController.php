<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch the total number of products
        $totalProducts = Product::count();

        // Fetch the total number of orders
        $totalOrders = Order::count();

        return view('dashboard.index', compact('totalProducts', 'totalOrders'));
    }
}
