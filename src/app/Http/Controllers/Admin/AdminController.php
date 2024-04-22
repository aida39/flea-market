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

        $users = [];
        $items = [];
        $comments = [];

        $items = Item::with('comments')->get();

        $users = User::with('comments','profile')->get();

        return view('admin.index', compact('users', 'items', 'comments'));
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
