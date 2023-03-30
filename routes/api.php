<?php

use App\Http\Controllers\Api\v1\PostController;
use Illuminate\Support\Facades\Route;

Route::resource('posts', PostController::class);
