<?php

    namespace App\Infrastructure\Persistence\User\Repositories;

    use App\Application\User\DTOs\UserDTO;
    use App\Domains\User\Entities\UserEntity;

    interface UserRepositoryInterface {
        public function create(UserDTO $dto): UserEntity;
    }