<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Models\Comment;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $display = $request->input('display');

        $users = [];
        $items = [];
        $comments = [];

        if ($display === 'comments_by_item' || $display === null) {
            $items = Item::with('comments')->get();
        } elseif ($display === 'comments_by_user') {
            $users = User::with('comments')->get();
        } elseif ($display === 'user_list') {
            $users = User::with('profile')->get();
        }
        return view('admin.index', compact('users', 'items', 'comments', 'display'));
    }

    public function deleteComment(Request $request, $id)
    {
        Comment::find($request->comment_id)->delete();

        return redirect()->back();
    }

    public function deleteUser(Request $request, $id)
    {
        User::find($request->user_id)->delete();

        return redirect()->back();
    }
}
