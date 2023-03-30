<?php

use App\Http\Controllers\ForbiddenController;
use Illuminate\Support\Facades\Route;


Route::any('{all}', ForbiddenController::class)
    ->where('all', '^(?!api).*$');
