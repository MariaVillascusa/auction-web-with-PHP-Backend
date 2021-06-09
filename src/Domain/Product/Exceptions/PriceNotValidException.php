<?php


namespace IESLaCierva\Domain\Product\Exceptions;


use IESLaCierva\Domain\Exceptions\ParameterNotValid;

class PriceNotValidException extends \Exception implements ParameterNotValid
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct('Price not valid');
    }
}