<?php


namespace IESLaCierva\Domain\Bid\valueObject;


use IESLaCierva\Domain\Bid\Exceptions\CurrentBidNotValidException;

class CurrentBid
{
    private int $currentBid;

    public function __construct(int $currentBid)
    {
        if($currentBid <= 0 ){
            throw new CurrentBidNotValidException();
        }
        $this->currentBid = $currentBid;
    }

    public function value(): int
    {
        return $this->currentBid;
    }


}