<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function plan()
    {
        return view('sessions.plan');
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($attributes)) {
            return back()
                ->withInput()
                ->withErrors(['email' => 'email not verified.']);
        }

        session()->regenerate();
        return redirect('/')->with('success', 'Welcome Back');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'GoodBye');
    }
}
