<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class UserRepository implements UserRepositoryInterface {

    function getAll(): Collection
    {
        return User::orderBy('timezone')->get();
    }

    function getByTimezones(array $timezones): Collection
    {
        return User::whereIn('timezone', $timezones)->get();   
    }

    function create(Request $request): User
    {
        return new User($request->all());
    }
}