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

        // $validator = Validator::make($request->all(), [
        //     'email' => 'required|email|exists:users,email',
        //     'password' => 'required'
        // ]);


        if (!Auth::attempt($validated)) {

            return back()->with('auth_error', 'Incorret password');
            // dd("Error");
        }
        $user = Auth::user();
        // dd($user);

        // dd($request->user()->getRoleNames());
        // get all permissions for the user, either directly, or from roles, or from both
        // $permissions = $user->getDirectPermissions();
        // $permissions = $user->getPermissionsViaRoles();

        $permissions = $user->getAllPermissions();
        dd($permissions);

    }
}
