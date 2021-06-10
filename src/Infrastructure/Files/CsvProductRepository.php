<?php


namespace IESLaCierva\Infrastructure\Files;


use Exception;
use IESLaCierva\Domain\Product\Product;
use IESLaCierva\Domain\Product\ProductRepository;
use IESLaCierva\Domain\Product\valueObject\Price;

class CsvProductRepository implements ProductRepository
{
    private array $products;

    public function __construct()
    {
        $file = fopen(__DIR__ . '/products.csv', "r");
        if (false === $file) {
            throw new Exception('File not found');
        }

        while (($data = fgetcsv($file, 1000, ',')) !== false) {
            $product = $this->hydrate($data);
            $this->products[$product->id()] = $product;
        }

        fclose($file);
    }

    public function findAll(): array
    {
        return array_values($this->products);
    }

    public function findById(string $id): ?Product
    {
        foreach ($this->products as $product) {
            if ($product->id() === $id) {
                return $product;
            }
        }
        return null;
    }

    public function save(Product $product): void
    {
        $file = fopen(__DIR__ . '/products.csv', "a");
        if (false === $file) {
            throw new Exception('File not found');
        }
        fputcsv($file, [
            $product->id(),
            $product->name(),
            $product->price()->value(),
            $product->description(),
            $product->datetime(),
            $product->image()
        ]);
        fclose($file);
    }

    private function hydrate($data): Product
    {
        return new Product(
            $data[0],
            $data[1],
            new Price($data[2]),
            $data[3],
            $data[4],
            $data[5]
        );
    }


}