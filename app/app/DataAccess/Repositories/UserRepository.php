<?php

// Change here.

namespace App\DataAccess\Repositories;

use App\DataAccess\Infrastructure\EloquentRepository;

use App\DataAccess\Repositories\Contracts\IUserRepository;

use App\DataAccess\Models\User;

class UserRepository extends EloquentRepository implements IUserRepository {
    protected function model() {
        return User::class;
    }

    public function getByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function getByApiKey($apiKey)
    {
        return $this->model->where('api_key', $apiKey)->first();
    }

    public function updateApiKeyByEmail($email, $apiKey)
    {
        $this->model->where('email', $email)->update(['api_key' => $apiKey]);
    }
}

?>