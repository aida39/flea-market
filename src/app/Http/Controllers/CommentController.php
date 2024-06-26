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

        foreach ($comments as $comment) {
            $comment->is_user_comment = $comment->user_id === Auth::id();
        }

        $favorite_count = Favorite::where('item_id', $id)->count();
        $is_favorite = $item->favorite->contains('user_id', Auth::id());

        $is_available = $item->order ? false : true;

        return view('comment', compact('item', 'comments', 'comment_count', 'favorite_count', 'is_favorite', 'is_available'));
    }

    public function storeComment(CommentRequest $request, $id)
    {
        $comment_data = $request->only('comment');
        $comment_data['user_id'] = Auth::id();
        $comment_data['item_id'] = $id;

        Comment::create($comment_data);

        return redirect('/comment/' . $id);
    }

    public function deleteComment(Request $request)
    {
        Comment::find($request->comment_id)->delete();

        return redirect()->back();
    }
}
