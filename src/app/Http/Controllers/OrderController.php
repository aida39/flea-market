<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Http\Requests\AddressRequest;

class OrderController extends Controller
{
    public function showPurchasePage($id)
    {
        $item = Item::findOrFail($id);

        $shipping_address = session('shipping_address');

        if ($shipping_address) {
            return view('purchase', compact('item', 'shipping_address'));
        } else {
            $user = Auth::user();

            if ($user->profile && $user->profile->address) {
                $shipping_address = [
                    'address' => $user->profile->address,
                ];
                return view('purchase', compact('item', 'shipping_address'));
            } else {
                return view('purchase', compact('item', 'shipping_address'));
            }
        }
    }

    public function showAddressForm($id)
    {
        $user = Auth::user();
        $profile = $user->profile;

        $shipping_address = session('shipping_address');

        if ($shipping_address) {
            return view('address', compact('profile', 'id', 'shipping_address'));
        } else {
            if ($profile && $profile->address) {
                $shipping_address = [
                    'postal_code' => $profile->postal_code,
                    'address' => $profile->address,
                    'building' => $profile->building,
                ];
                return view('address', compact('profile', 'id', 'shipping_address'));
            } else {
                return view('address', compact('profile', 'id', 'shipping_address'));
            }
        }
    }


    public function storeAddress(AddressRequest $request, $id)
    {
        $address = $request->only(['postal_code', 'address', 'building']);

        $request->session()->put('shipping_address', $address);

        return redirect('/purchase/' . $id);
    }
}
