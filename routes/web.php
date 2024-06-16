<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IpSingleSession;

Route::get('/', function () {
    return view('welcome');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(IpSingleSession::class);


