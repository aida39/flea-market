<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class FavoriteController extends Controller
{
    public function switchFavoriteStatus($id)
    {
        $user_id = Auth::id();
        $item = Item::findOrFail($id);

        $favorite = $item->favorite()->where('user_id', $user_id);

        $favorite->exists()
            ? $favorite->delete()
            : $item->favorite()->create(['user_id' => $user_id]);

        return redirect()->back();
    }
}
