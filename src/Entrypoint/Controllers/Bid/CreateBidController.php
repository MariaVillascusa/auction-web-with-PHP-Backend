<?php

namespace IESLaCierva\Entrypoint\Controllers\Bid;

use IESLaCierva\Application\Bid\CreateNewBid\CreateNewBidService;
use IESLaCierva\Infrastructure\Database\MySqlBidRepository;
use IESLaCierva\Infrastructure\Files\CsvBidRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateBidController
{
    private CreateNewBidService $service;

    public function __construct()
    {
        $this->service = new CreateNewBidService(new MySqlBidRepository());
    }

    public function execute(Request $request): Response
    {
        $json = $request->getContent();
        $data = json_decode($json, true);
        $this->service->execute($data['productId'], $data['user'], $data['currentBid']);
        return new JsonResponse([], Response::HTTP_CREATED);
    }
}
