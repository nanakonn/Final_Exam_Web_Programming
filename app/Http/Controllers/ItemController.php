<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index() {
        $item_data = Item::paginate(10);

        return view('home.home', compact('item_data'),);
    }

    public function detail($id) {
        $item_data = Item::all()->where('id', $id)->first();

        return view('product.detail', compact('item_data'),);
    }
}
