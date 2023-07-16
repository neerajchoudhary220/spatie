<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function list()
    {

        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);



        if (!Auth::attempt($validated)) {

            return back()->with('auth_error', 'Incorret password');
            // dd("Error");
        }
        $user = Auth::user();


        $permissions = $user->getAllPermissions();
        dd($permissions);

    }
}
