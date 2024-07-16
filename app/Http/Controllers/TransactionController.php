<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\SiteSetting;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function complete_transaction() {
        App::setLocale(SiteSetting::find(1)->locale);
        $carts = Cart::where('user_id', '=', Auth::user()->id)->get();
        $total_price = 0;
        $total_quantity = 0;
        foreach($carts as $cart) {
            $total_price += $cart->laptop->price;
            $total_quantity += 1;
        }
        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'total_price' => $total_price,
            'total_quantity' => $total_quantity,
            'date' => Carbon::now()
        ]);
        foreach($carts as $cart) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'laptop_id' => $cart->laptop->id
            ]);
            Cart::where('id', '=', $cart->id)->delete();
        }
        return redirect('profile');
    }

    public function view_profile() {
        App::setLocale(SiteSetting::find(1)->locale);
        $transactions = Transaction::where('user_id', '=', Auth::user()->id)->get();
        return view('profile', ['transactions' => $transactions]);
    }
}
