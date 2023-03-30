<?php

namespace App\Http\Controllers;

use Illuminate\Http\Exceptions\HttpResponseException;

class ForbiddenController extends Controller
{
    public function __invoke()
    {
        throw new  HttpResponseException(
            response()->json([
                'message' => 'Forbidden'
            ], 403)
        );
    }
}
