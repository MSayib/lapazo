<?php

use App\Http\Controllers\TestController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', [TestController::class, 'index']);
Route::get('/cek', function () {
    return Task::get();
});

