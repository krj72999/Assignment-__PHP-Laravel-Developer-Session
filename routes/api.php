<?php

use App\Http\Middleware\IpSingleSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function () {
    try {
        return response()->json([
            'status' => 'true',
            'message' => 'welcome-to-session-login'
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage()
        ], 500);
    }
})->middleware(IpSingleSession::class);