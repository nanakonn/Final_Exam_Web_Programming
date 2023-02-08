<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index() {
        $order_data = Order::all()->where('user_id', Auth::user()->id);

        return view('order.order', compact('order_data'),);
    }

    public function store($item_id, Request $request) {
        $item_data = Item::all()->where('id', $item_id)->first();
        $price = $item_data->price;

        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->item_id = $item_id;
        $order->price = $price;
        $order->save();

        return redirect('/home');
    }

    public function delete($item_id) {
        $order = Order::all()->where('item_id', $item_id)->first();
        $order->delete();

        return redirect()->route('order');
    }

    public function checkout() {
        Order::where('user_id', Auth::user()->id)->delete();

        return redirect()->route('orderSuccess');
    }

    public function index2() {
        return view('order.success', );
    }
}
