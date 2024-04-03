<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Comment;


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
        $comments = Comment::where('item_id', $id)->with('user.profile')->get();
        $comment_count = $comments->count();
        return view('item', compact('item','categories', 'comment_count'));
    }

    public function showCommentPage($id)
    {
        $item = Item::findOrFail($id);
        $comments = Comment::where('item_id', $id)->with('user.profile')->get();
        $comment_count = $comments->count();
        return view('comment', compact('item' , 'comments','comment_count'));
    }

    public function storeComment(Request $request, $id)
    {
        $comment_data = array_merge($request->only('comment'), ['user_id' => Auth::id(), 'item_id' => $id]);
        Comment::create($comment_data);

        return redirect('/comment/' . $id);
    }

}
