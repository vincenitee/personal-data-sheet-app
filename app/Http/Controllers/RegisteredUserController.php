<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.signup');
    }

    public function store()
    {
        dd(request()->all());
    }
}
