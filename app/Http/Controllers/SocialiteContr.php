<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Facades\Auth;


class SocialiteContr extends Controller
{

    public function  redirectGoogle()
    {

        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()

    {
        $user = Socialite::driver('google')->stateless()->user();

        $finduser = User::where('social_id', $user->id)->first();

        if ($finduser) {
            Auth::login($finduser);
            return redirect("/userHome");
        } else {
            $newUser = User::updateOrCreate([
                'social_id' => $user->id,
            ], [
                'name' => $user->name,
                'email' => $user->email,
                'password' => null,
                'social_id' => $user->id,
            ]);

            Auth::login($newUser);
            return redirect("/userHome");
        }
    }
}
