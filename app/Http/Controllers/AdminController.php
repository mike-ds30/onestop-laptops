<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function access_admin_mode() {
        App::setLocale(SiteSetting::find(1)->locale);
        if(Auth::user()->role == 'admin') {
            Session::put('admin_privileges', Auth::user()->username);
        }
        return redirect('/profile');
    }

    public function exit_admin_mode() {
        App::setLocale(SiteSetting::find(1)->locale);
        if(Auth::user()->role == 'admin') {
            Session::forget('admin_privileges');
        }
        return redirect('/profile');
    }
}
