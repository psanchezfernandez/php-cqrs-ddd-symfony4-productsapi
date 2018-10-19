<?php

namespace ProductsAPI\Aplication\Product\Command\Update;

use ProductsAPI\Domain\Product\Model\Product;
use ProductsAPI\Domain\Product\Model\ProductDescription;
use ProductsAPI\Domain\Product\Model\ProductId;
use ProductsAPI\Domain\Product\Model\ProductName;

class UpdateProductCommandHandler
{
    /**@var UpdateProductService */
    private $service;

    /**
     * UpdateProductCommandHandler constructor.
     * @param UpdateProductService $service
     */
    public function __construct(UpdateProductService $service)
    {
        $this->service = $service;
    }
    
    public function handle(UpdateProductCommand $command){

        $this->service->update(
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