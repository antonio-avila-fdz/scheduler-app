<?php

namespace App\Repositories\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    public function getAll(): Collection;
    public function getByTimezones(array $timezones): Collection;
    public function create(Request $request): User;
}
