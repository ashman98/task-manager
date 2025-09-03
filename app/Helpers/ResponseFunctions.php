<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

trait ResponseFunctions
{
    /**
     * Function to send OK response.
     */
    public function sendSuccess(array $response = []): JsonResponse
    {
        $response['status'] = 'success';

        return response()->json($response);
    }
}
