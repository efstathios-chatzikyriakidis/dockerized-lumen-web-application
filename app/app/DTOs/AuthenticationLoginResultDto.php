<?php

namespace App\DTOs;

class AuthenticationLoginResultDto
{
    public $apiKey;

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }
}

?>