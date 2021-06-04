<?php

namespace IESLaCierva\Entrypoint\Controllers\Product;

use IESLaCierva\Application\Product\GetAllProducts\GetAllProductService;
use IESLaCierva\Infrastructure\Files\CsvProductRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GetAllProductsController
{

    public function execute(Request $request): Response
    {
        $file = fopen('./../src/Infrastructure/Files/products.csv', "r");
        if (false === $file) {
            throw new Exception('File not found');
        }

        while (($data = fgetcsv($file, 1000, ',')) !== false) {
            $products[] = [
                'articleId' => $data[0],
                'name' => $data[1],
                'price' => $data[2],
                'description' => $data[3],
                'datetime' => $data[4],
                'image' => $data[5]
                ];
        }

        return new JsonResponse($products);
    }
}
