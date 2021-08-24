<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        $fields = request()->validate([
            'username'=>'required|string',
            'password'=> 'required|string',          
        ]);
       //check user
       $user = User::Where('username',$fields['username'])->first();
       
       //check password
       if(!$user ||!Hash::check($fields['password'],$user->password)){
            return response([
                'message'=>'Username or password is incorrect',
            ],401);
       }
        $token = $user->createToken('restaurante_api')->plainTextToken;
        $response = [
            'user'=> $user,
            'token'=> $token
        ];
        return response($response,201);
        
    }
    public function register(){
        $fields = request()->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'username'=>'required|string|unique:users,email',
            'password'=> 'required|string|confirmed',
            'id_rol'=>'required',
            'tel'=>'required|string',
            'cel'=>'required|string',
            'tiq'=>'required|string',
            'foto'=>'required|string'
        ]);
        $user = User::create([
            'name'=>$fields['name'],
            'email'=>$fields['email'],
            'username'=>$fields['username'],
            'password'=>bcrypt( $fields['password']),
            'id_rol'=>$fields['id_rol'],
            'tel'=>$fields['tel'],
            'cel'=>$fields['cel'],
            'tiq'=>$fields['tiq'],
            'foto'=>$fields['foto']
        ]);
        $token = $user->createToken('restaurante_api')->plainTextToken;
        $response = [
            'user'=> $user,
            'token'=> $token
        ];
        return response($response,201);
    }
    public function logout(){
        auth()->user()->tokens()->delete();
        return [
            'message'=>'session ended and token destroyed'
        ];
    }
}
