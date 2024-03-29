<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function create() {
        return view('register.create');
    }

    public function store() {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            // 'username' => ['required', 'min:3', 'max:255', Rule::unique('users','username')],
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|max:255'
        ]);

        // $attributes['password'] = bcrypt($attributes['password']);


        $user = User::create($attributes);

        // log user in
        auth()->login($user);


        // session()->flash('success', 'Your account has been created.');
        return redirect('/')->with('success', 'Your account has been created.');

    }
}
