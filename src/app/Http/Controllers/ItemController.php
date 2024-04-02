<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;


class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('index', compact('items'));
    }

    public function detail($id)
    {
        $item = Item::with('condition')->findOrFail($id);
        $categories = $item->categories;
        return view('item', compact('item', 'categories'));
    }

}
