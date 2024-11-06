<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class details extends Controller
{
    public function show(User $user)
    {
        return view('dashboard', ['user' => $user]);
    }
}
