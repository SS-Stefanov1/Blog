<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class UserController extends Controller {
    public function create() {
        return view('users.register');
    }

    public function store(Request $req) {
        $formData = $req->validate([
            'name'     => ['required', 'min:4'],
            'email'    => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        $formData['password'] = bcrypt($formData['password']);

        $user = User::create($formData);

        auth()->login($user);

        return redirect('/')->with('message', 'Account created successfully!');
    }

    public function login(Request $req) {
        return view('users.login');
    }
}
