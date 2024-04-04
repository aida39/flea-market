<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class FavoriteController extends Controller
{
    public function switchFavoriteStatus(Request $request, $id)
    {
        $user_id = Auth::id();
        $item = Item::findOrFail($id);

        if ($item->favorite()->where('user_id', $user_id)->exists()) {
            $item->favorite()->where('user_id', $user_id)->delete();
        } else {
            $item->favorite()->create(['user_id' => $user_id]);
        }

        return redirect()->back();
    }
}
