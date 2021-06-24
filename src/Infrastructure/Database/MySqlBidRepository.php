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
        return array_values($productbids);
    }

    public function save(Bid $bid): void
    {
        $stmt = $this->connection->prepare('REPLACE INTO bids(id, productId, user,currentBid, datetime)
                VALUES (:id, :productId,:user, :currentBid, :datetime)');

        $stmt->execute(
            [
                'id' => $bid->id(),
                'productId' => $bid->productId(),
                'user' => $bid->user(),
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
            $data['user'],
            new CurrentBid($data['currentBid']),
            new \DateTimeImmutable($data['datetime'])
        );
    }
}