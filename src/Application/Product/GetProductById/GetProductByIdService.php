<?php


namespace IESLaCierva\Application\Product\GetProductById;


use IESLaCierva\Domain\Product\Exceptions\ProductNotFoundException;
use IESLaCierva\Domain\Product\Product;
use IESLaCierva\Domain\Product\ProductRepository;

class GetProductByIdService
{

    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(string $id): Product
    {
        $product = $this->productRepository->findById($id);

        if ($product === null) {
            throw new ProductNotFoundException();
        }

        return $product;
    }
}