<?php

// app/Services/UserService.php
namespace App\Services;

use App\Contracts\UserServiceInterface;
use App\Repositories\UserRepository;

class UserService implements UserServiceInterface {
    
    protected $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function createUser(array $data) {
        // lógica de creación de usuario
        return $this->userRepository->create($data);
    }
}
