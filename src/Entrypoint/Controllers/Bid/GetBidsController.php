<?php

namespace IESLaCierva\Entrypoint\Controllers\Bid;

use IESLaCierva\Application\Product\GetBids\GetBidService;
use IESLaCierva\Infrastructure\Files\CsvBidRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use IESLaCierva\Entrypoint\Controllers\Product\GetProductByIdController;


class GetBidsController
{
    public function execute(Request $request): Response
    {
        $file = fopen('./../src/Infrastructure/Files/bids.csv', "r");
        if (false === $file) {
            throw new Exception('File not found');
        }
        $productId = $request->get('productId');
        /* //$articleId = (new \IESLaCierva\Entrypoint\Controllers\Product\GetProductByIdController)->execute($request->get('articleId'));
          $product = new GetProductByIdController;
          $result = $product->execute($bidId);
          */
        $bids = [];
        while (($data = fgetcsv($file, 1000, ',')) !== false) {
            if ($productId === $data[1]) {
                $bids = [
                    'bidId' => $data[0],
                    'productId' => $data[1],
                    'currentBid' => $data[2],
                    'datetime' => $data[3],
                ];
            }
        }
        return new JsonResponse($bids);
    }

}
