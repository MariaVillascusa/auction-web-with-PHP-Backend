<?php


namespace IESLaCierva\Application\Bid\CreateNewBid;


use IESLaCierva\Domain\Bid\Bid;
use IESLaCierva\Domain\Bid\BidRepository;
use IESLaCierva\Domain\Bid\valueObject\CurrentBid;

class CreateNewBidService
{
    private BidRepository $bidRepository;

    public function __construct(BidRepository $bidRepository)
    {
        $this->bidRepository = $bidRepository;
    }

    public function execute(string $productId, string $currentBid)
    {
        $bid = Bid::create($productId, new CurrentBid($currentBid));
        $this->bidRepository->save($bid);
    }
}
