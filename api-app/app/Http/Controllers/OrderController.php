<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order_placed($id){

        $product = Product::findOrFail($id);

        $order = Order::query()->create([
            'customer_id' => auth()->user()->id,
            'amount' => $product->price * 1
        ]);

        $order->orderItems()->create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => 1,
            'price' => $product->price,
        ]);

        $order->scorePoints()->create([
            'order_id' => $order->id,
            'customer_id' => auth()->user()->id,
            'points' => 1,
            'amount' => 10.00,
        ]);

        return response()->json([
            'data' => $order,
            'massage' => 'order placed success.'
        ], 201);

    }
}
