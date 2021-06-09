<?php


namespace IESLaCierva\Domain\Product\valueObject;


use IESLaCierva\Domain\Product\Exceptions\PriceNotValidException;

class Price
{
    private int $price;

    public function __construct($price)
    {
        if ($price <= 0) {
            throw new PriceNotValidException();
        }
        $this->price = $price;
    }

    public function value(): int
    {
        return $this->price;
    }
}