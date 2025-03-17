<?php

namespace App\Http\Controllers\Typeform\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $validatedData = $request->validate([
            'email'=>'required|email|string',
            'password'=>'required'
        ]);

    }
}
