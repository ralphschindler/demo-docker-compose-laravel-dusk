<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $user = User::first();

    return view('welcome', compact('user'));
});
