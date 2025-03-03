<?php

namespace App\Repositories;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserRepository implements UserRepositoryInterface {

    function getAll(): Collection
    {
        return User::all();
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