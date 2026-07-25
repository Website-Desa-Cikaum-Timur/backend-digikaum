<?php

namespace App\Shared\Exceptions;

class ResourceNotFoundException extends DomainException
{
    public function __construct(string $resource = 'Resource')
    {
        parent::__construct($resource . ' tidak ditemukan.');
    }
}
