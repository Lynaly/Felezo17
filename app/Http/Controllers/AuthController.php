<?php

namespace App\Http\Controllers;


use App\Models\SocialAccount;
use App\Models\User;
use Auth;
use GuzzleHttp\Exception\ClientException;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class AuthController extends Controller
{
    const BME_UNIT_NEWBIE = 'BME_VIK_NEWBIE';

    public function login()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('news.index');
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $socialite_user = Socialite::driver($provider)->user();
        } catch (InvalidStateException $exception) {
            return redirect()->route('auth.redirect', [
                'provider' => $provider
            ]);
        } catch (ClientException $exception) {
            return redirect()->route('auth.redirect', [
                'provider' => $provider
            ]);
        }

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

        }
        else if( in_array(AuthController::BME_UNIT_NEWBIE, $socialite_user->bmeunit) ) {
            return view('auth.newbie');
        }
        else {
            $user = User::create([
                'name'      => $socialite_user->name,
                'email'     => $socialite_user->email,
                'unit'      => $this->getUnit($socialite_user->bmeunit)
            ]);

            SocialAccount::create([
                'user_id'       => $user->id,
                'provider'      => $provider,
                'provider_id'   => $socialite_user->id
            ]);

            Auth::login($user);
        }

        return redirect()->intended('/orders');
    }

    private function getUnit($units)
    {
        if( $units == null || !count($units) )
            return 'Nem BME';

        if( in_array('BME_VIK_ACTIVE', $units) )
            return 'BME VIK (Aktív)';

        if( in_array('BME_VIK', $units) )
            return 'BME VIK (Passzív)';

        if( in_array('BME', $units) )
            return 'BME';

        return 'Nem BME';
    }
}