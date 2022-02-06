<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public $name = 'name';

    public function getAll()
    {
        $users = User::All();
        return $users;
    }
}
