<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller {
    public function create() {
        return view('users.register');
    }

    public function store(Request $req) {
        $formData = $req->validate([
            'user'     => ['required', 'min:4'],
            'email'    => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:6']
        ]);

        $formData['password'] = bcrypt($formData['password']);

        $user = User::create($formData);

        auth()->login($user);

        return redirect('/')->with('message', 'Account created successfully!');
    }
}
