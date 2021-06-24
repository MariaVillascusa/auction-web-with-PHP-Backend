<?php


namespace IESLaCierva\Domain\Bid;


use DateTimeImmutable;
use IESLaCierva\Domain\Bid\valueObject\CurrentBid;

class Bid implements \JsonSerializable
{
    private string $id;
    private string $productId;
    private string $user;
    private CurrentBid $currentBid;
    private \DateTimeImmutable $datetime;

    public function __construct(string $id, string $productId, string $user, CurrentBid $currentBid, DateTimeImmutable $datetime)
    {
        $this->id = $id;
        $this->productId = $productId;
        $this->user = $user;
        $this->currentBid = $currentBid;
        $this->datetime = $datetime;
    }

    public static function create(string $productId, string $user, CurrentBid $currentBid): Bid
    {
        return new self(
            uniqid(),
            $productId,
            $user,
            $currentBid,
            new \DateTimeImmutable());
    }


    public function id(): string
    {
        return $this->id;
    }

    public function productId(): string
    {
        return $this->productId;
    }

    public function user(): string
    {
        return $this->user;
    }

    public function currentBid(): CurrentBid
    {
        return $this->currentBid;
    }

    public function datetime(): DateTimeImmutable
    {
        return $this->datetime;
    }


    public function jsonSerialize()
    {
        return [
            'id' => $this->id(),
            'productId' => $this->productId(),
            'user' => $this->user(),
            'currentBid' => $this->currentBid()->value(),
            'datetime' => $this->datetime()->format(DATE_ATOM)
        ];
    }


}