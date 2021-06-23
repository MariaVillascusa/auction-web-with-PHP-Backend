<?php


namespace IESLaCierva\Entrypoint\Controllers\Session;


use IESLaCierva\Infrastructure\Database\MySqlUserRepository;
use IESLaCierva\Infrastructure\Files\CsvUserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginRequestController
{

    public function execute(Request $request): Response
    {
        $username = $request->get('username');
        $password = $request->get('password');

        $userRepository = new MySqlUserRepository();
        $user = $userRepository->findByUsername($username);

        if ($user === null) {
            return new JsonResponse('Invalid username or password');
        }

        if (!password_verify($password, $user->password())) {
            return new JsonResponse('Invalid username or password');
        }

        $_SESSION['name'] = $user->name();
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $user->email()->value();

        return new JsonResponse(['ok']);

    }
}