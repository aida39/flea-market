<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

class OrderController extends Controller
{
    public function showPurchasePage($id)
    {
        $item = Item::findOrFail($id);
        return view('purchase', compact('item'));
    }

    public function showAddressForm($id)
    {
        $user = Auth::user();
        $profile = $user->profile;

        $item = Item::findOrFail($id);
        return view('address', compact('item', 'profile'));
    }

    public function storeAddress(Request $request)
    {
        //
    }
}
