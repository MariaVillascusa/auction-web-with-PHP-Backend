<?php

namespace IESLaCierva\Entrypoint\Controllers\User;

use IESLaCierva\Application\User\GetUserById\GetUserByIdService;
use IESLaCierva\Infrastructure\Database\MySqlUserRepository;
use IESLaCierva\Infrastructure\Files\CsvUserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GetUserByIdController
{
    public function __construct()
    {
        $this->service = new GetUserByIdService(new MySqlUserRepository());
    }

    public function execute(Request $request): Response
    {
        $userId = $request->get('id');
        $user = $this->service->execute($userId);
        return new JsonResponse($user);
    }
}
