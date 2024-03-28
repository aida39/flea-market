<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;


class ItemController extends Controller
{
    public function index()
    {
        $items= Item::all();
        return view('index', compact('items'));
    }

    public function showDetail($id)
    {
        $item = Item::findOrFail($id);

        return view('item', compact('item'));
    }
}
