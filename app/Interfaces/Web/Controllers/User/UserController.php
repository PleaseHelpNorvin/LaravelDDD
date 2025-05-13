<?php

    namespace App\Interfaces\Web\Controllers\User;

    use App\Application\User\DTOs\UserDTO;
    use App\Application\User\UseCases\CreateUserUseCase;
    use App\Http\Requests\CreateUserRequest;

    class UserController {
       public function store(CreateUserRequest $request, CreateUserUseCase $useCase)
       {
            $dto = new UserDTO (
                name: $request->input('name'),
                email: $request->input('email'),
                password: $request->input('password'),
            );

            $user = $useCase->execute($dto);

        return response()->success(['user' => $user], 'User created successfully');
       }
    }