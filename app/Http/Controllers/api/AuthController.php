<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\Sanctum;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function register(Request $request){
        $fields=$request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string|confirmed'


        ]);

        $user=User::create([
            'name'=>$fields['name'],
            'email'=>$fields['email'],
             'password'=>bcrypt($fields['password'])

        ]);

        $token=$user->createToken('myapptoken')->plainTextToken;

        $response=[
            'user'=>$user,
            'token'=>$token

        ];

        return response($response,201);

    }
    public function login(Request $request)

    {


        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

            $user = Auth::user();

            $token=$user->createToken('myapptoken')->plainTextToken;

            $name=  $user->name;
            $response=[
                'name'=>$name,
                'token'=>$token

            ];


            return response($response,201);

        }

        else{

            return ['error'=>'Unauthorised'];

        }

    }

    public function logout(Request $request){
        $user = auth()->user();
        $user->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
