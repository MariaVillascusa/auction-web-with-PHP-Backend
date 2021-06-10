<?php

namespace IESLaCierva\Entrypoint\Controllers\Bid;

use IESLaCierva\Application\Bid\CreateNewBid\CreateNewBidService;
use IESLaCierva\Infrastructure\Files\CsvBidRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateBidController
{
    private CreateNewBidService $service;

    public function __construct()
    {
        $this->service = new CreateNewBidService(new CsvBidRepository());
    }

    public function execute(Request $request): Response
    {
        $json = $request->getContent();
        $data = json_decode($json, true);
        $this->service->execute($data['productId'], $data['currentBid']);
        return new JsonResponse([], Response::HTTP_CREATED);
    }
}
