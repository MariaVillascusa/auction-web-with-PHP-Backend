<?php


namespace IESLaCierva\Domain\Product;


use IESLaCierva\Domain\Product\valueObject\Price;

class Product implements \JsonSerializable
{
    private string $id;
    private string $name;
    private Price $price;
    private string $description;
    private string $datetime;
    private string $image;

    public function __construct(string $id, string $name, Price $price, string $description, string $datetime, string $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->datetime = $datetime;
        $this->image = $image;
    }

//TO-DO REVISAR LO DE LA HORA

    public static function create(string $name, Price $price, string $description, string $datetime, string $image): Product
    {
        return new self(uniqid(), $name, $price, $description, $datetime, $image);
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function price(): Price
    {
        return $this->price;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function datetime(): string
    {
        return $this->datetime;
    }

    public function image(): string
    {
        return $this->image;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id(),
            'name' => $this->name(),
            'price' => $this->price()->value(),
            'description' => $this->description(),
            'datetime' => $this->datetime(),
            'image' => $this->image()
        ];
    }
}