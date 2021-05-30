<?php

namespace IESLaCierva\Entrypoint\Controllers\Product;

use IESLaCierva\Application\Product\GetProductById\GetProductByIdService;
use IESLaCierva\Infrastructure\Files\CsvProductRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GetProductByIdController
{

    public function execute(Request $request): Response
    {
        $file = fopen('./../src/Infrastructure/Files/products.csv', "r");
        if (false === $file) {
            throw new Exception('File not found');
        }

        $articleId = $request->get('articleId');

        if (null === $articleId) {
            return new JsonResponse([], Response::HTTP_BAD_REQUEST);
        }

        $product = [];

        while (($data = fgetcsv($file, 1000, ',')) !== false) {
            if ($data[0] === $articleId) {
                $product = [
                    'articleId' => $data[0],
                    'name' => $data[1],
                    'price' => $data[2],
                    'description' => $data[3],
                    'image' => $data[4]
                    ];
            }
        }

        fclose($file);
        return new JsonResponse($product, count($product) ? Response::HTTP_OK : Response::HTTP_NOT_FOUND);

    }

}
