<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\ShippingAddress;
use App\Models\Order;
use App\Models\PaymentType;
use App\Http\Requests\AddressRequest;
use Stripe\Stripe;
use Stripe\Charge;

class OrderController extends Controller
{
    public function showPurchasePage($id)
    {
        $item = Item::findOrFail($id);
        $shipping_address = session('shipping_address');
        $selected_payment_type = session('selected_payment_type');

        if ($shipping_address) {
            return view('purchase', compact('item','shipping_address','selected_payment_type'));
        } else {
            $user = Auth::user();

            if ($user->profile) {
                $shipping_address = $user->profile;
                return view('purchase', compact('item','shipping_address','selected_payment_type'));
            } else {
                return view('purchase', compact('item','shipping_address','selected_payment_type'));
            }
        }
    }

    public function submitPurchase(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $user = Auth::user();

        $shipping_address = session('shipping_address') ?? ($user->profile->only(['postal_code', 'address', 'building']));
        $shipping_address_record = ShippingAddress::create(array_merge($shipping_address, ['user_id' => $user->id]));

        $payment_type = request()->input('payment_type');

        Order::create([
            'user_id' => $user->id,
            'item_id' => $item->id,
            'payment_type_id' => $payment_type,
            'shipping_address_id' => $shipping_address_record->id,
        ]);

        $amount = $request->input('amount');

        if ($payment_type === "1") {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $charge = Charge::create(array(
                'amount' => $amount,
                'currency' => 'jpy',
                'source' => request()->stripeToken,
            ));
        }

        return redirect('/')->with('result', '購入処理が完了しました');
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

    public function showPaymentForm($id)
    {
        $payment_types = PaymentType::all();
        $selected_payment_type = session('selected_payment_type');

        if ($selected_payment_type) {
            return view('payment', compact('id', 'payment_types', 'selected_payment_type'));
        } else {
            return view('payment', compact('id', 'payment_types',));
        }
    }

    public function storePayment(Request $request, $id)
    {
        $request->session()->put('selected_payment_type', [
            'id' => $request->input('id'),
            'name' => PaymentType::findOrFail($request->input('id'))->name,
        ]);

        return redirect('/purchase/' . $id);
    }

}
