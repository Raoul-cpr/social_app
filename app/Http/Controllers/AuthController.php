<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginview()
    {
        return view('auth.login');
    }
    public function registerview()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('homepage');
        } else {
            return  redirect()->back()->withErrors("Les identifiants ne correspondent pas");
        }
    }

    public function register(Request $request)

    {

        $request->validate([
            "firstName" => "required",
            "lastName" => "required",
            "email" => "required|email",
            "password" => "required",
            "location" => "required",
            "job" => "required",
        ]);
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $fileName = uniqid() . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('public/images',  $fileName);
            $photoPath = 'images/' . $fileName;
            $user = User::create([
                "firstName" => $request->input('firstName'),
                "lastName" => $request->input('lastName'),
                "email" => $request->input('email'),
                "password" => Hash::make($request->input('password')),
                "location" => $request->input('location'),
                "job" => $request->input('job'),
                "image" => $photoPath
            ]);
            if ($user) {
                Auth::login($user);
                $request->session()->regenerate();

                return redirect()->route('homepage');
            };
        } else {
            $user = User::create([
                "firstName" => $request->input('firstName'),
                "lastName" => $request->input('lastName'),
                "email" => $request->input('email'),
                "password" => Hash::make($request->input('password')),
                "location" => $request->input('location'),
                "job" => $request->input('job'),
                "image"=>"0"
            ]);
            if ($user) {
                Auth::login($user);
                $request->session()->regenerate();
                return redirect()->route('posts');
            };
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
