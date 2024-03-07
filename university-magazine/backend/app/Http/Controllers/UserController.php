<?php

namespace App\Http\Controllers;

use App\Models\AssignedRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'faculty_id' => 'required|exists:faculties,id',
            'role' => 'required|numeric', // Assuming 'role' is a numeric ID, adjust validation as needed
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Proceed with user creation if validation passes
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assuming the role is directly provided and validated, attach the role and faculty
        AssignedRole::create([
            'user_id' => $user->id,
            'role_id' => $request->role,
            'faculty_id' => $request->faculty_id,
            // Optionally, handle start_time and end_time if needed
        ]);

        // Redirect or return response after successful registration
        return redirect('dashboard')->with('success', 'Registration successful!');
    }
}