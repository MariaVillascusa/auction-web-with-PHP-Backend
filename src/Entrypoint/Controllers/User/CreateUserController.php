<?php

namespace IESLaCierva\Entrypoint\Controllers\User;

use IESLaCierva\Application\User\CreateNewUser\CreateNewUserService;
use IESLaCierva\Infrastructure\Database\MySqlUserRepository;
use IESLaCierva\Infrastructure\Files\CsvUserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateUserController
{
    private CreateNewUserService $service;

    public function __construct()
    {
        $this->service = new CreateNewUserService(new MySqlUserRepository());
    }

    public function execute(Request $request): Response
    {
        $name = $request->get('name');
        $username = $request->get('username');
        $email = $request->get('email');
        $password = password_hash($request->get('password'),PASSWORD_DEFAULT);
        $this->service->execute($name,$username,$email,$password);
        return new JsonResponse([], Response::HTTP_CREATED);
    }
}
