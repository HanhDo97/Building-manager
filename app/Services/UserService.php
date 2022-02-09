<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserNew;
use App\Notifications\RegisterSuccess;

class UserService
{
    public function sendNotification($user)
    {
        return $user->notify(new RegisterSuccess($user));
    }

    public function sendMail($user)
    {
        return Mail::to($user)->send(new UserNew());
    }

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
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->address),
        ]);

        return $user;
    }

    public function findUser($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function updateUser($request, $user)
    {
        $user->name = $request->name ? $request->name : $user->name;
        $user->email = $request->email ? $request->email : $user->email;
        $user->save();
        return $user;
    }

    public function deleteUser($user)
    {
        return $user->delete();
    }
}
