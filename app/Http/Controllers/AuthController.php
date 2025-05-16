<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register(Request $request){

        $validated = $request->validate([
            'name' => 'string|required|max:50',
            'email' => 'string|email|unique:users,email',
            'password' => [
            'required',
            'string',
            'confirmed',
                Password::min(8)
                    ->mixedCase() 
                    ->numbers(), 

             ],

        ]);

         // Create user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

         flash()->success('Account created successfully!');
         return redirect()->route('login');


    }

        public function login(Request $request)
        {
            $validated = $request->validate([
                'email' => 'required|string|email',
                'password' => [
                    'required',
                    'string',
                    Password::min(8)
                        ->mixedCase()
                        ->numbers(),
                ],
            ]);

            if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
                flash()->success('Login successful!');
                return redirect()->route('home');
            }

            flash()->error('Login failed!');
            return redirect()->route('login')->withInput(); // preserves input
        }

        public function logout(){
            Auth::logout();
            flash()->success('User logout successfully!');
            return redirect()->route('login');
        }
}
