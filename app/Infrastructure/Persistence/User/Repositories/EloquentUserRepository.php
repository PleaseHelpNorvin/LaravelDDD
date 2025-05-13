<?php

    namespace App\Infrastructure\Persistence\User\Repositories;

    use App\Application\User\DTOs\UserDTO;
    use App\Domains\User\Entities\UserEntity;
    use App\Models\User;


    final class EloquentUserRepository implements UserRepositoryInterface{
        
        public function create(UserDTO $dto): UserEntity 
        {
            // Create the user in the database
            $user = User::create([
                'name' => $dto->name,
                'email' => $dto->email,
                'password' => bcrypt($dto->password),
            ]);

            // Return the created user as a UserEntity
            return new UserEntity(
                id: $user->id,
                name: $user->name,
                email: $user->email
            );
        }

        public function findById(int $userId): UserEntity
        {
            $user = User::findOrFail($userId);
            
            return new UserEntity(
                id: $user->id,
                name: $user->name,
                email: $user->email
            );
        }

        public function findAll(): array
        {
            $users = User::all();

            return $users->map(function($user) {
                
                return new UserEntity(
                    id: $user->id,
                    name: $user->name,
                    email: $user->email
                );

            })->toArray();
        }
    }
    
