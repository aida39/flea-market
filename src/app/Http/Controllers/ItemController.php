<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Comment;
use App\Models\Favorite;


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

        return view('item', compact('item', 'categories', 'comment_count', 'favorite_count', 'is_favorite'));
    }

    public function showCommentPage($id)
    {
        $item = Item::findOrFail($id);

        $comments = Comment::where('item_id', $id)->with('user.profile')->get();
        $comment_count = $comments->count();

        $favorite_count = Favorite::where('item_id', $id)->count();
        $is_favorite = $item->favorite->contains('user_id', Auth::id());

        return view('comment', compact('item', 'comments', 'comment_count', 'favorite_count', 'is_favorite'));
    }

    public function storeComment(Request $request, $id)
    {
        $comment_data = array_merge($request->only('comment'), ['user_id' => Auth::id(), 'item_id' => $id]);
        Comment::create($comment_data);

        return redirect('/comment/' . $id);
    }
}
