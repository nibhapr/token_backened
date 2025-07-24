<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Session;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class AuthController extends Controller
{
    public function index()
    {
        return view('login.login');
    }
    
    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $settings = Setting::first();
            session(['settings' => $settings]);
            if ($settings->language_id) {
                session(['locale' => $settings->language->code]);
            }
            return redirect()->intended('dashboard')->with('success', 'Succesfully Logged in');
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }
    public function logout()
    {
        session()->invalidate();
        Auth::guard('web')->logout();
        return redirect()->route('dashboard');
    }

    public function setEnv()
    {
        file_put_contents(app()->environmentFilePath(), str_replace(
            'SESSION_DRIVER=file',
            'SESSION_DRIVER=database',
            file_get_contents(app()->environmentFilePath())
        ));
    }
}
