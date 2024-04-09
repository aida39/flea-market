<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Comment;
use App\Models\Favorite;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function showCommentPage($id)
    {
        $item = Item::findOrFail($id);

        $comments = $item->comments()->with('user.profile')->get();
        $comment_count = $comments->count();

        $favorite_count = Favorite::where('item_id', $id)->count();
        $is_favorite = $item->favorite->contains('user_id', Auth::id());

        return view('comment', compact('item', 'comments', 'comment_count', 'favorite_count', 'is_favorite'));
    }

    public function storeComment(CommentRequest $request, $id)
    {
        $comment_data = array_merge($request->only('comment'), ['user_id' => Auth::id(), 'item_id' => $id]);
        Comment::create($comment_data);

        return redirect('/comment/' . $id);
    }

    public function deleteComment(Request $request, $id)
    {
        Comment::find($request->comment_id)->delete();

        return redirect()->back();
    }
}
