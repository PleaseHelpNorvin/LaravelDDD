<?php
namespace App\Application\User\DTOs;

class UserDTO {
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
    ) {}
}