<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (Auth()->attempt($request->only('email', 'password'))) {
            return response()->json([
                'token'=>$request->user()->createToken($request->name)->plainTextToken,
                'message' => 'Success',
                'status' => 'true'
            ]);

        }
        return response()->json([
            'message' => 'Unauthorized',
            'status' => 'false'
        ], 401);
    }
    public function validateLogin(Request $request)
    {
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required'
        ]);
    }
}
