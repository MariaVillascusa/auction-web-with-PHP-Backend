<?php


namespace IESLaCierva\Domain\Bid;


interface BidRepository
{
    public function find(string $productId): array;

    public function save(Bid $bid):void;
}