<?php

namespace ProductsAPI\Aplication\Product\Command\Add;

use ProductsAPI\Domain\Product\Model\Product;
use ProductsAPI\Domain\Product\Model\ProductDescription;
use ProductsAPI\Domain\Product\Model\ProductId;
use ProductsAPI\Domain\Product\Model\ProductName;

class AddProductCommandHandler
{
    /**@var AddProductService */
    private $service;

    /**
     * AddProductCommandHandler constructor.
     * @param AddProductService $service
     */
    public function __construct(AddProductService $service)
    {
        $this->service = $service;
    }

    public function handle(AddProductCommand $command)
    {
        $this->service->add(
            new Product(
                new ProductId($command->getId()),
                new ProductName($command->getName()),
                new ProductDescription($command->getDescription()),
                $command->getPrice(),
                $command->getStock()
            )
        );
    }


}