<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function loginFormAction()
    {
        if (Auth::check()) {
        return redirect()
            ->route('profile')
            ->with('success', 'You are already logged in.');
        }

        return view('auth.login');
    }

    public function loginAction(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(!Auth::attempt($credentials)) {
            return back()
            ->withErrors([
                'email' => 'The provided credentials are incorrect.',
            ])
            ->withInput();
        }

        $request->session()->regenerate();

        return redirect()->route('crm.dashboard');
    }

    public function registerFormAction() 
    {
        return view('auth.register');
    }

    public function registerAction(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:225',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => $validateData['password'],
        ]);

        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->route('profile');
    }

    public function profileAction()
    {
        $user = Auth::user();

        return view('auth.profile', [
            'user' => $user,
        ]);
    }

    public function updateProfileAction(Request $request)
    {
        /** @var \App\Models\User $user */

        $user = Auth::user();

        $validateData = $request->validate([
            'name' => 'required|string|max:225',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
        ]);

        $user->update($validateData);

        return redirect()
               -> route('profile')
               ->with('success', 'Profile update sucessfully.');
    }

    public function logoutAction(Request $request) 
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
?>