<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Socialite;
use App\Models\User;
use Auth;
use Mail;
use App\Mail\User\AfterRegister;

class UserController extends Controller
{
    public function login(){
        return view('auth.user.login');
    }

    public function google(){
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback(){
        $callback = Socialite::driver('google')->stateless()->user();
        $data = [
            'name'=>$callback->getName(),
            'email'=>$callback->getEmail(),
            'avatar'=>$callback->getAvatar(),
            'email_verified_at'=> date('Y-m-d H:i:s', time()),
            //'email_verified_at'=> now()
        ];

        // $user = User::firstOrCreate(['email'=>$data['email']],$data);

        // Digunakan untuk mailtrap/ atau Email seperti Gmail, Yahoo dll (email after register)
        $user = User::whereEmail($data['email'])->first();
        if (!$user){
            $user = User::create($data);
        }
            // mengirim email ke user
            Mail::to($user->email)->send(new AfterRegister($user));

        Auth::login($user, true);

        return redirect(route('welcome'));
    }
}
