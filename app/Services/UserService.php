<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserService
{
    public $credential = [
        'email' => '',
        'name' => '',
        'password' => ''
    ];

    public function getAll()
    {
        $users = User::All();
        return $users;
    }

    public function validator($request)
    {
        return Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function storeUser($request)
    {
        $validate = $this->validator($request);
        if ($validate->fails()) {
            return redirect('users.create')->withErrors($validate->errors())->withInput();
        }

        dd(1);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->address),
        ]);

        return $user;
    }
}
