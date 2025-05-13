<?php

    namespace App\Application\User\UseCases;

    use App\Infrastructure\Persistence\User\Repositories\UserRepositoryInterface;

    class GetAllUsersUseCase {
        public function __construct(private UserRepositoryInterface $repo) {}

        public function execute(): array
        {
            return $this->repo->findAll();
        }
    }
