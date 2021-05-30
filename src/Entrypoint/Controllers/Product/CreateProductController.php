<?php

namespace IESLaCierva\Entrypoint\Controllers\Product;

use IESLaCierva\Application\Product\CreateNewProduct\CreateNewProductService;
use IESLaCierva\Infrastructure\Files\CsvProductRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateProductController
{
    public function execute(Request $request): Response
    {
        $data = json_decode(@file_get_contents('php://input'), true);

        if (isset($data['name']) && isset($data['price']) && isset($data['description']) && isset($data['image'])) {
            $file = fopen('./../src/Infrastructure/Files/products.csv', "a");
            if (false === $file) {
                throw new Exception('File not found');
            }
            fputcsv($file, [uniqid(), $data['name'], $data['price'], $data['description'], $data['image']]);
            fclose($file);
            return new JsonResponse([], Response::HTTP_CREATED);
        } else {
            return new JsonResponse(["error" => "Missing parameters"], Response::HTTP_BAD_REQUEST);
        }
    }
}
