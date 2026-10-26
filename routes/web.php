<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/db-test', function () {
    try {
        \DB::connection()->getPdo();
        $dbName = \DB::connection()->getDatabaseName();
        return response()->json([
            'status' => 'success',
            'tier' => 'Three-Tier Architecture Verified',
            'database' => $dbName
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage()
        ], 500);
    }
});
