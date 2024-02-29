<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{
    use HasApiTokens, HasFactory;


    public function dashboard()
    {

        return view(
            'dashboard',

            [
                'faculties' => Faculty::all(),
            ]
        );
    }


    public function logout()
    {
        auth()->logout();
        return redirect('/login')->with('success', 'Good Bye');
    }


    public function login()
    {
        return view('login');
    }


    public function apiLogin()
    {
        $cleanData = Request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);


        if (auth()->attempt($cleanData)) {

            return redirect('/dashboard')->with('success', 'Welcome Back ' . auth()->user()->name);

            // $token = auth()->user()->createToken('AuthToken')->plainTextToken;

            // return response()->json(['token' => $token], 200);

        } else {
            return back()->withErrors([
                'email' => 'Your Credentials is something wrong'
            ]);
        }
    }
}
