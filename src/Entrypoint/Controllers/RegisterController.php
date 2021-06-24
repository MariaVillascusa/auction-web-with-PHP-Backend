<?php


namespace IESLaCierva\Entrypoint\Controllers;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RegisterController
{
    public function execute(Request $request): Response
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/../../Infrastructure/Views/Templates');
        $twig = new \Twig\Environment($loader,[]);
        $response = new Response();
        $response->setContent($twig->render('register.twig', []));
        return $response;
    }
}