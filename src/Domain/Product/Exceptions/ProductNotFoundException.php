<?php


namespace IESLaCierva\Domain\Product\Exceptions;


use IESLaCierva\Domain\Exceptions\NotFoundException;

class ProductNotFoundException extends \Exception implements NotFoundException
{
    public function __construct()
    {
        parent::__construct('Product Not Found Exception');
    }
}