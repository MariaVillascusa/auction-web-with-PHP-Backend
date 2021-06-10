<?php

namespace IESLaCierva\Entrypoint\Controllers\Product;

use IESLaCierva\Application\Product\GetProductById\GetProductByIdService;
use IESLaCierva\Infrastructure\Files\CsvProductRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GetProductByIdController
{
    private GetProductByIdService $getProductByIdService;

    public function __construct()
    {
        $this->service = new GetProductByIdService(new CsvProductRepository());
    }

    public function execute(Request $request): Response
    {
        $id = $request->get('articleId');

        $product = $this->service->execute($id);
        return new JsonResponse($product);

    }

}
