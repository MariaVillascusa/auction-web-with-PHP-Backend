<?php
namespace IESLaCierva\Entrypoint\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    public function execute(Request $request): Response
    {
        $loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/../../Infrastructure/Views/Templates');
        $twig = new \Twig\Environment($loader,[]);
        $response = new Response();
        $response->setContent($twig->render('home.twig', []));
        return $response;
    }
}
