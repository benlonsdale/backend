<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    public function authenticate(Request $request){

    }

    public function signup(Request $request){

        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = new User();
        $user->fill($fields);
        // $user->save();
        return $user;
    }

    public function resetPassword(Request $request){

    }

}
