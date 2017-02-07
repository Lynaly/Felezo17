<?php

namespace App\Http\Controllers;


use App\Models\SocialAccount;
use App\Models\User;
use Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $socialite_user = Socialite::driver($provider)->user();

        $account = SocialAccount::whereProvider($provider)
            ->where('provider_id', $socialite_user->id)
            ->first();

        if( $account )
        {
            if( !Auth::check() )
            {
                Auth::login($account->user);
            } else
                dd("error");

        } else {

            $user = User::create([
                'name'  => $socialite_user->name,
                'email' => $socialite_user->email
            ]);

            SocialAccount::create([
                'user_id'       => $user->id,
                'provider'      => $provider,
                'provider_id'   => $socialite_user->id
            ]);

            Auth::login($user);
        }

        return redirect()->intended('/');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('news.index');
    }
}