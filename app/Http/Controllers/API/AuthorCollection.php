<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthorCollection extends Controller
{
    public function register(Request $request){
        $data= $request->validate([
            'name'=>'required|string|max:191',
            'email'=>'required|email|max:191|unique:users,email',
            'password'=>'required|string|max:191',

        ]);
        $user= User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
        ]);
        $token=$user->createToken('fundaprojectToken')->plainTextToken;

        $response=[
            'user'=>$user,
            'token'=> $token,
        ];
        return response($response ,201);
    }
}
