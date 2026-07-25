<?php

namespace App\Shared\Responses;

use Illuminate\Http\JsonResponse;

final class ApiResponse
{
    public static function success(
        mixed $data = null,
        string $message = 'Request berhasil diproses.',
        array $meta = [],
        int $status = 200,
    ): JsonResponse {
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message,
            'meta' => $meta,
        ], $status);
    }

    public static function error(
        string $message = 'Terjadi kesalahan pada server.',
        array $errors = [],
        int $status = 400,
        array $meta = [],
    ): JsonResponse {
        return response()->json([
            'success' => false,
            'data' => null,
            'message' => $message,
            'errors' => $errors,
            'meta' => $meta,
        ], $status);
    }
}
