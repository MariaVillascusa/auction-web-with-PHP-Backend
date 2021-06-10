<?php

namespace IESLaCierva\Entrypoint\Controllers\Bid;

use IESLaCierva\Application\Bid\GetBids\GetBidsService;
use IESLaCierva\Infrastructure\Files\CsvBidRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use IESLaCierva\Entrypoint\Controllers\Product\GetProductByIdController;


class GetBidsController
{

    private GetBidsService $getBidsService;

    public function __construct(){
        $this->service = new GetBidsService(new CsvBidRepository());
    }

    public function execute(Request $request): Response
    {

        $productId = $request->get('articleId');
        $bids = $this->service->execute($productId);
        return new JsonResponse($bids);
    }

}
