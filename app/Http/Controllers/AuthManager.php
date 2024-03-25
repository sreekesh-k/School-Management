<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function login()
    {
        if (Auth::check()) {
            return redirect(route('reading'));
        }
        return view('login');
    }
    function register()
    {
        if (Auth::check()) {
            return redirect(route('reading'));
        }
        return view('Register');
    }
    function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('reading'));
        }
        return redirect(route('login'))->with('Error', 'invalid credintials');
    }
    function registerPost(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);
        if (!$user) {
            return redirect(route('register'))->with("Error", "Couldnt Register");
        }
        return redirect()->intended(route('login'))->with("Success", "You can now login");
    }
    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->intended(route('login'));
    }
    function studentLogin()
    {
        return view('studentLogin');
    }
    function studentLoginpost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        $name = $request->name;
        $password = $request->password;
        $student = student::where('name', $name)->first();
        if ($student) {
            if ($student->password === $password) {
                Session::put('name', $name);
                // Session::forget('name');
                return redirect()->intended(route('marks'));
            } else {
                return redirect()->intended(route('students'))->with("Error", "Wrong Password");
            }
        } else {
            return redirect()->intended(route('students'))->with("Error", "Invalid Credentials");
        }
    }
    function marks(){
        return view('marks');
    }
}
