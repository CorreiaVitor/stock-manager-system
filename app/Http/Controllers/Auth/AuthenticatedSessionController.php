<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginResquest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): view
    {
        return view('auth.login');
    }

    public function store(LoginResquest $request) : RedirectResponse
    {

        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('login');
    }
}
