<?php

namespace IESLaCierva\Entrypoint\Controllers\Product;

use IESLaCierva\Application\Product\CreateNewProduct\CreateNewProductService;
use IESLaCierva\Infrastructure\Files\CsvProductRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateProductController
{
    private CreateNewProductService $service;

    public function __construct()
    {
        $this->service = new CreateNewProductService(new CsvProductRepository());
    }

    public function execute(Request $request): Response
    {
        $json = $request->getContent();
        $data = json_decode($json, true);
        $newProduct = $this->service->execute($data['name'], $data['price'], $data['description'], $data['datetime'],$data['image']);
        return new JsonResponse(['id'=>$newProduct->id()], Response::HTTP_CREATED);
    }
}
