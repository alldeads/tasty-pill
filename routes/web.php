<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;


Route::get('/', [WebController::class, 'index'])->name('index');

Route::post('/file/post', [WebController::class, 'upload'])->name('upload');
