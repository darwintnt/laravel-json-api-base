<?php


namespace App\Http\Services;

use App\Models\User;
use App\Http\Interfaces\UserInterface;

class UserService implements UserInterface
{

    public function share($request)
    {

        return User::findOrfail($request['id']);

    }

}
