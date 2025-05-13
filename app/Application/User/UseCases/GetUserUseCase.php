<?php

    namespace App\Application\User\UseCases;

    use App\Infrastructure\Persistence\User\Repositories\UserRepositoryInterface;
    use App\Domains\User\Entities\UserEntity;

    class GetUserUseCase {
        public function __construct(private UserRepositoryInterface $repo) {}

        public function execute(int $userId): UserEntity
        {
            return $this->repo->findById($userId);
        }
    }