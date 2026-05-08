<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use Auth;

class HomeController extends Controller
{
    public function dashboard(){
        $checkouts = Checkout::with('Camp')->whereUserId(Auth::id())->get();
        // Versi Lain
        // $checkouts = Checkout::with('Camp')->where('UserId',Auth::id())->get();
        // return $checkouts;
        return view('user.dashboard',[
            'checkout' => $checkouts
        ]);
    }
}
