<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart() {
        App::setLocale(SiteSetting::find(1)->locale);
        $carts = Auth::user()->carts;
        $total_quantity = 0;
        $total_price = 0;
        foreach($carts as $cart) {
            $total_quantity += 1;
            $total_price += $cart->laptop->price;
        }
        return view('cart', ['carts' => $carts, 'total_quantity' => $total_quantity, 'total_price' => $total_price]);
    }

    public function add_to_cart(Request $req, $id) {
        App::setLocale(SiteSetting::find(1)->locale);
        $cart = Cart::where('user_id', '=', Auth::user()->id)->where('laptop_id', '=', $id)->first();
        if(!$cart) {
            Cart::create([
                'user_id' => Auth::user()->id,
                'laptop_id' => $id
            ]);
        }
        return redirect('/cart');
    }

    public function delete_from_cart($id) {
        App::setLocale(SiteSetting::find(1)->locale);
        Cart::where('id', '=', $id)->delete();
        return redirect('/cart');
    }
}
