<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\User\AfterRegister;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.user.login');
    }

    public function google()
    {
        // return 'google redirect';
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallBack()
    {
        $callBack = Socialite::driver('google')->stateless()->user();
        $data = [
            'name' => $callBack->getName(),
            'email' => $callBack->getEmail(),
            'avatar' => $callBack->getAvatar(),
            'email_verified_at' => date('Y-m-d H:i:s', time()),
        ];


        // $user = User::firstOrCreate(['email' => $data['email']], $data);

        $user = User::whereEmail($data['email'])->first();
        if(!$user) {
            $user = User::create($data);
            Mail::to($user->email)->send(new AfterRegister($user));
        }
        Auth::login($user, true);

        return redirect(route('welcome'));

    }
}
