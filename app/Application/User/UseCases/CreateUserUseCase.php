<?php

    namespace App\Application\User\UseCases;

    use App\Application\User\DTOs\UserDTO;
    use App\Infrastructure\Persistence\User\Repositories\UserRepositoryInterface;
    use App\Domains\User\Entities\UserEntity;


    class CreateUserUseCase {
        public function __construct(private UserRepositoryInterface $repo) {}

        public function execute( UserDTO $dto): UserEntity
        {
            return $this->repo->create($dto);
        }
    }