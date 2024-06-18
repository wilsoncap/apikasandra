<?php

namespace App\Contracts;

interface UserServiceInterface {
    public function createUser(array $data);
}