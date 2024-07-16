<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Laptop;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class WebController extends Controller
{
    public function home() {
        App::setLocale(SiteSetting::find(1)->locale);
        $brand1 = Brand::where('id', '=', 1)->first();
        $brand2 = Brand::where('id', '=', 2)->first();
        $brand3 = Brand::where('id', '=', 3)->first();
        $brand4 = Brand::where('id', '=', 4)->first();
        $laptop1 = Laptop::where('id', '=', 1)->first();
        $laptop2 = Laptop::where('id', '=', 6)->first();
        $laptop3 = Laptop::where('id', '=', 11)->first();
        $laptop4 = Laptop::where('id', '=', 16)->first();
        return view('home', [
            'brand1' => $brand1,
            'brand2' => $brand2,
            'brand3' => $brand3,
            'brand4' => $brand4,
            'laptop1' => $laptop1,
            'laptop2' => $laptop2,
            'laptop3' => $laptop3,
            'laptop4' => $laptop4
        ]);
    }

    public function change_language(Request $req, $locale) {
        SiteSetting::where('id', '=', 1)->update([
            'locale' => $locale
        ]);
        App::setLocale(SiteSetting::find(1)->locale);
        return redirect()->back();
    }
}
