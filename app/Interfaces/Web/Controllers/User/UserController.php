<?php

    namespace App\Interfaces\Web\Controllers\User;

    use App\Application\User\DTOs\UserDTO;
    use App\Application\User\UseCases\CreateUserUseCase;
    use App\Application\User\Usecases\GetUserUseCase;
    use App\Application\User\Usecases\GetAllUsersUseCase;
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

       public function show(int $id, GetUserUseCase $usecase)
       {
        try {
            $user = $usecase->execute($id);

            return response()->success(['user' => $user],'User retrieved successfully');

        } catch (\Exception $e) {
            return response()->notFound('User not found');
        }
       }

       public function index(GetAllUsersUseCase $useCase)
       {
        $users = $useCase->execute();

        return response()->success(['users' => $users],'Users retrieved successfully');
       }

    }