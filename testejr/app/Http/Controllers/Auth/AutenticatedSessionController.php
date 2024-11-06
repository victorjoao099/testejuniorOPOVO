<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AutenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('Auth/login');
    }

    // Lidando com uma requisição recebida

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        // dd('a');

        $request->session()->regenerate();

        return Redirect()->intended(route('dashboard', absolute: false));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
