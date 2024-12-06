<?php

namespace App\Http\Controllers;
use App\Models\Order;


use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all(); // Fetch all orders
        return view('admin.order.index', compact('orders')); // Pass orders to the view
    }
    
    public function show($id)
{
    $order = Order::with('orderItems.product')->findOrFail($id);

    return view('admin.order.show', compact('order'));
}

}
