<?php


namespace IESLaCierva\Domain\Product;


interface ProductRepository
{
    public function findAll(): array;

    public function findById(string $id): ?Product;

    public function save(Product $product): void;

}