<?php

// Change here.

namespace App\Services;

use App\Services\Contracts\IUserService;

use App\DataAccess\Repositories\Contracts\IUserRepository;

use App\Validation\Contracts\IUserCreateRequestValidation;

use Illuminate\Support\Facades\Hash;

class UserService implements IUserService
{
    private $userRepository;

    private $userCreateRequestValidation;

    public function __construct(IUserRepository $userRepository, IUserCreateRequestValidation $userCreateRequestValidation) {
        $this->userRepository = $userRepository;

        $this->userCreateRequestValidation = $userCreateRequestValidation;
    }

    public function create($data)
    {
        $this->userCreateRequestValidation->validate($data);

        $input = [
            'first_name' => $data['firstName'],

            'last_name' => $data['lastName'],

            'email' => $data['email'],

            'password' => Hash::make($data['password'])
        ];

        return $this->userRepository->create($input);
    }

    public function credentialsVerified($email, $password)
    {
        $user = $this->userRepository->getByEmail($email);

        return $user && Hash::check($password, $user->password);
    }

    public function refreshApiKeyByEmail($email)
    {
        $apiKey = base64_encode(str_random(40));

        $this->userRepository->updateApiKeyByEmail($email, $apiKey);

        return $apiKey;
    }

    public function getAll()
    {
        return $this->userRepository->getAll();
    }
}

?>