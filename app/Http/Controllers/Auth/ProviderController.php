<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ProviderController extends Controller
{
    
    /**
     * Redirect user to github authentication page
     * 
     */

     public function redirect($provider)
     {
        return Socialite::driver($provider)->redirect();
     }

    /**
     * callback user to github authentication page
     * 
     */

     public function callback($provider)
     {
        $SocialUser = Socialite::driver($provider)->user();

        //create the new record represent data
        $user = User::updateOrCreate([
         
            'name' => $SocialUser->name,
            'email' => $SocialUser->email,
            'provider_id' => $SocialUser->token,
     ], );
  
     Auth::login($user);
  
     return redirect('/home');
     }
}
