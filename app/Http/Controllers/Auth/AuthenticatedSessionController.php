<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Requests\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): view
    {
        return view('auth.login');
    }
}
