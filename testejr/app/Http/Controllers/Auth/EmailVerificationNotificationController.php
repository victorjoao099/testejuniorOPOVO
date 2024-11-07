<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        // dd($request->user()->sendEmailVerificationNotification());
        // dd($request->user()->hasVerifiedEmail());    
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', absolute: false));
        }

        // dd($request->user()->sendEmailVerificationNotification());

        return back()->with('status', 'verification-link-send');
    }
}
