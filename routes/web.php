<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::resource('tasks', TaskController::class);

Route::get('/test', function () {
    return view('test');
});
