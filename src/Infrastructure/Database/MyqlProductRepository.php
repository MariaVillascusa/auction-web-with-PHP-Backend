<?php


namespace IESLaCierva\Infrastructure\Database;

use IESLaCierva\Domain\Product\Product;
use IESLaCierva\Domain\Product\ProductRepository;
use IESLaCierva\Domain\Product\valueObject\Price;

class MyqlProductRepository extends AbstractMySqlRepository implements ProductRepository
{

    public function findAll(): array
    {
        $stmt = $this->connection->prepare('SELECT * FROM products');
        $stmt->execute();
        $products = [];
        while ($row = $stmt->fetch()) {
            $products[] = $this->hydrate($row);
        }
        return $products;    }

    public function findById(string $id): ?Product
    {
        $stmt = $this->connection->prepare('SELECT * FROM products WHERE id = :id');
        $stmt->execute(['id' => $id]);
        if ($stmt->rowCount() === 0) {
            return null;
        }
        return $this->hydrate($stmt->fetch());
    }

    public function save(Product $product): void
    {
        $stmt = $this->connection->prepare('REPLACE INTO products(id, name,price, description, datetime, image)
                VALUES (:id, :name, :price, :description, :datetime, :image)');

        $stmt->execute(
            [
                'id' => $product->id(),
                'name' => $product->name(),
                'price' => $product->price()->value(),
                'description' => $product->description(),
                'datetime' => $product->datetime(),
                'image' => $product->image()
            ]
        );    }

    private function hydrate(array $data): Product
    {
        return new Product(
            $data['id'],
            $data['name'],
            new Price($data['price']),
            $data['description'],
            $data['datetime'],
            $data['image']
        );
    }
}