<?php

// Change here.

namespace App\Services\Contracts;

interface IUserService
{
    public function getAll();

    public function credentialsVerified($email, $password);

    public function refreshApiKeyByEmail($email);

    public function create($data);
}

?>