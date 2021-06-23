<?php


namespace IESLaCierva\Infrastructure\Database;


use IESLaCierva\Domain\Bid\Bid;
use IESLaCierva\Domain\Bid\BidRepository;
use IESLaCierva\Domain\Bid\valueObject\CurrentBid;

class MySqlBidRepository extends AbstractMySqlRepository implements BidRepository
{

    public function find(string $productId): array
    {
        $stmt = $this->connection->prepare('SELECT * FROM bids WHERE productId = :productId');
        $stmt->execute(['productId' => $productId]);
        $productbids = [];

        while ($row = $stmt->fetch()) {
            $productbids[] = $this->hydrate($row);
        }
        if ($stmt->rowCount() === 0) {
            $productbids = null;
        }
        return array_values($productbids);
    }

    public function save(Bid $bid): void
    {
        $stmt = $this->connection->prepare('REPLACE INTO bids(id, productId,currentBid, datetime)
                VALUES (:id, :productId, :currentBid, :datetime)');

        $stmt->execute(
            [
                'id' => $bid->id(),
                'productId' => $bid->productId(),
                'currentBid' => $bid->currentBid()->value(),
                'datetime' => $bid->datetime()->format(DATE_ATOM)
            ]
        );
    }

    private function hydrate(array $data): Bid
    {
        return new Bid(
            $data['id'],
            $data['productId'],
            new CurrentBid($data['currentBid']),
            new \DateTimeImmutable($data['datetime'])
        );
    }
}