<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    public function authenticate(Request $request){

        $fields = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $fields['email'], 'password' => $fields['password']])) {
            // Authentication passed...
            $user = User::where('email', $fields['email'])->first();
            foreach($user->tokens as $token) {
                $token->revoke(); 
                $token->delete();  
            }
            $user->token = $user->createToken('Auth')->accessToken;
            return response()->json(['user' => $user], 200);
        }

        return response('not authenticated', 401);

    }

    public function signup(Request $request){

        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = new User();
        $user->fill($fields);
        $user->save();
        return $user;
    }

    public function resetPassword(Request $request){
        $fields = $request->validate([            
            'email' => 'required|exists:users,email',
            'password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if (Auth::attempt(['email' => $fields['email'], 'password' => $fields['password']])) {
            // Authentication passed...
            $user = User::where('email', $fields['email'])->first();
            $user->password = $fields['new_password'];
            // return json_encode($user);
            $user->save();
            return 'password changed';
        }

        return 'not authenticated';
    }

}
