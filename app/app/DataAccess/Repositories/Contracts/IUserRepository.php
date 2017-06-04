<?php

// Change here.

namespace App\DataAccess\Repositories\Contracts;

use App\DataAccess\Infrastructure\IRepository;

interface IUserRepository extends IRepository
{
    public function getByEmail($email);

    public function getByApiKey($apiKey);

    public function updateApiKeyByEmail($email, $apiKey);
}

?>