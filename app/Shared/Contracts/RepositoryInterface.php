<?php

namespace App\Shared\Contracts;

interface RepositoryInterface
{
    public function findById(string $id): mixed;

    public function create(array $data): mixed;

    public function update(string $id, array $data): mixed;

    public function delete(string $id): bool;
}
