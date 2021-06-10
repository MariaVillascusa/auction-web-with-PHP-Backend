<?php


namespace IESLaCierva\Application\Bid\GetBids;


use IESLaCierva\Domain\Bid\BidRepository;

class GetBidsService
{
    private BidRepository $bidRepository;

    public function __construct(BidRepository $bidRepository)
    {
        $this->bidRepository = $bidRepository;
    }

    public function execute(string $productId): array
    {
        return $this->bidRepository->find($productId);
    }

}