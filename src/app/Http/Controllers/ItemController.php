<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Condition;
use App\Models\Category;
use App\Http\Requests\SellRequest;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        $favorite_items = Item::whereHas('favorite', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();
        return view('index', compact('items', 'favorite_items'));
    }

    public function detail($id)
    {
        $item = Item::with('condition')->findOrFail($id);
        $categories = $item->categories;

        $comment_count = Comment::where('item_id', $id)->count();
        $favorite_count = Favorite::where('item_id', $id)->count();
        $is_favorite = $item->favorite->contains('user_id', Auth::id());
        $is_available = $item->order ? false : true;

        return view('item', compact('item', 'categories', 'comment_count', 'favorite_count', 'is_favorite', 'is_available'));
    }

    public function search(Request $request)
    {
        $items = Item::KeywordSearch($request->keyword)->get();
        $favorite_items = Item::whereHas('favorite', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();

        return view('index', compact('items', 'favorite_items'));
    }

    public function showListingForm()
    {
        $categories = Category::all();
        $conditions = Condition::all();

        return view('sell', compact('conditions', 'categories'));
    }

    public function storeItem(SellRequest $request)
    {
        $request->file('image')->store('public/images');
        $image_path = 'storage/images/' . $request->file('image')->hashName();

        $item_data = array_merge($request->only('condition_id', 'name', 'brand', 'description', 'price'), ['user_id' => Auth::id(), 'image_path' => $image_path, 'recommend_flag' => '1']);

        $item = Item::create($item_data);
        $categories = $request->input('category_id');
        $item->categories()->attach($categories);

        return redirect('/mypage');
    }
}
