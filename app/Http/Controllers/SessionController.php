<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{


    public function create(Request $request) {
        return view("auth.login");
    }

    public function store(Request $request) {
        $attributes = request()->validate([
            'email'=> ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => 'Password or email does not match',
                'password' => 'Password or email does not match',
            ]);
        }
        

        // regenerate session token
        request()->session()->regenerate();

        // redirect
        return redirect('/');
    }

    public function destroy(Request $request) {
        Auth::logout();

        return redirect('/');
    }
}
