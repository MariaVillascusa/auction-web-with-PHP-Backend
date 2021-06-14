<?php


namespace IESLaCierva\Application\Product\CreateNewProduct;


use IESLaCierva\Domain\Product\Product;
use IESLaCierva\Domain\Product\ProductRepository;
use IESLaCierva\Domain\Product\valueObject\Price;

class CreateNewProductService
{

    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function execute(string $name, int $price, string $description, string $datetime, string $image)
    {
        $product = Product::create($name, new Price($price), $description, $datetime, $image);
        $this->productRepository->save($product);

        return $product;
    }
}