<?php


namespace IESLaCierva\Domain\Bid\Exceptions;


use IESLaCierva\Domain\Exceptions\ParameterNotValid;

class CurrentBidNotValidException extends \Exception implements ParameterNotValid
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
{
    parent::__construct('Current bid not valid');
}
}