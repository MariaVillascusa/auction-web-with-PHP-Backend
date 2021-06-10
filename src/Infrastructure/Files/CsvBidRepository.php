<?php


namespace IESLaCierva\Infrastructure\Files;


use Exception;
use IESLaCierva\Domain\Bid\Bid;
use IESLaCierva\Domain\Bid\BidRepository;
use IESLaCierva\Domain\Bid\valueObject\CurrentBid;

class CsvBidRepository implements BidRepository
{

    private array $bids;
    private array $productBids;


    public function __construct(){
        $file = fopen(__DIR__ . '/bids.csv', "r");
        if (false === $file) {
            throw new Exception('File not found');
        }

        while (($data = fgetcsv($file, 1000, ',')) !== false) {
            $bid = $this->hydrate($data);
            $this->bids[$bid->id()] = $bid;
        }
        fclose($file);
    }

    public function find(string $productId):array
    {
        $file = fopen(__DIR__ . '/bids.csv', "r");
        $productbids = [];
        while (($data = fgetcsv($file, 1000, ',')) !== false) {
            $bid = $this->hydrate($data);
            if ($bid->productId() === $productId) {

                $this->productBids[$bid->id()] = $bid;
            }
        }
        return array_values($this->productBids);
    }

    public function save(Bid $bid): void{
        $file = fopen(__DIR__ . '/bids.csv', "a");
        if (false === $file) {
            throw new Exception('File not found');
        }
        fputcsv($file, [
            $bid->id(),
            $bid->productId(),
            $bid->currentBid()->value(),
            $bid->datetime()->format(DATE_ATOM)
        ]);
        fclose($file);
    }

    private function hydrate($data): Bid
    {
        return new Bid(
            $data[0],
            $data[1],
            new CurrentBid($data[2]),
            new \DateTimeImmutable($data[3])
        );
    }

}