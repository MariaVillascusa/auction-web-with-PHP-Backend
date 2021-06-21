<?php


namespace IESLaCierva\Entrypoint\Controllers\Session;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class InfoController
{
    public function execute(Request $request): Response
    {

        return new JsonResponse([
            'name' => $_SESSION['name'] ?? null,
            'username' => $_SESSION['username'] ?? null,
            'email' => $_SESSION['email'] ?? null,
        ]);
    }
}