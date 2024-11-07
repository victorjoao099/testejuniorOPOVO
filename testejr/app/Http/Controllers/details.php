<?php

namespace App\Http\Controllers;

use App\Models\news;
use App\Models\User;
use Illuminate\Http\Request;

class details extends Controller
{
    public function show(User $user, news $news)
    {
        return view('dashboard', ['user' => $user], ['news' => $news]);
    }
}
