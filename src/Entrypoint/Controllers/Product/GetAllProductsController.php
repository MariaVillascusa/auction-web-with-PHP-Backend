<?php

namespace IESLaCierva\Entrypoint\Controllers\Product;

use IESLaCierva\Application\Product\GetAllProducts\GetAllProductService;
use IESLaCierva\Infrastructure\Database\MyqlProductRepository;
use IESLaCierva\Infrastructure\Files\CsvProductRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GetAllProductsController
{
    private GetAllProductService $getAllProductService;

    public function __construct(){
        $this->getAllProductService = new GetAllProductService(new MyqlProductRepository());
    }

    public function execute(Request $request): Response
    {
        $products = $this->getAllProductService->execute();

        return new JsonResponse($products);
    }
}
