<?php

namespace App\Exceptions\Api;

use RuntimeException;

class ApiException extends RuntimeException
{
    public function __construct(
        public readonly int $statusCode,
        public readonly string $rawBody,
        string $message = '',
    ) {
        parent::__construct($message ?: $rawBody);
    }
}
