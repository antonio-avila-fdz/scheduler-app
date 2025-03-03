<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

abstract class Controller
{
    abstract function index(): View;
    abstract function store(Request $request): Response;
}
