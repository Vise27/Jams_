<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class AuthController extends Controller
{
    public function Redirect(){

        return Socialite ::driver('facebook')->redirect();

    }

    public function callback(){
        $user = Socialite::driver('facebook')->user();

        /*$user = User::create([

            'name' => $user->getName(),
            'email'=>$user->getEmail(),
            'foto'=>$user->getAvatar() 

        ]);*/

        $user= User::firstOrCreate([
            'email'=>$user->getEmail(),
        ],[
            'name' => $user->getName(),
            'foto'=>$user->getAvatar()
        ]);
        auth()->login($user);
        return redirect()->to ('/index');
    }
}
