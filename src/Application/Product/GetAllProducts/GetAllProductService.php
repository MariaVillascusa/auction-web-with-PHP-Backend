<?php


namespace IESLaCierva\Application\Product\GetAllProducts;


use IESLaCierva\Domain\Product\ProductRepository;

class GetAllProductService
{

    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(): array
    {
        return $this->productRepository->findAll();
    }

}