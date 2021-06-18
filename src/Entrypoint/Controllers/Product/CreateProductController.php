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
        $name = $request->get('name');
        $price = $request->get('price');
        $description = $request->get('description');
        $datetime = $request->get('datetime');
        $image = $request->get('image');

        $newProduct = $this->service->execute($name, $price ,$description, $datetime,$image);
        return new JsonResponse(['id'=>$newProduct->id()], Response::HTTP_CREATED);
    }
}
