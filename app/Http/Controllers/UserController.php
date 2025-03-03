<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct(
        protected UserRepositoryInterface $userRepository) {
    }

    public function index(): View {
        $users = $this->userRepository->getAll();

        return view('home', compact('users'));
    }

    public function store(Request $request): Response
    {
        return response(['data' => 'User Created'], 201);
    }
}
