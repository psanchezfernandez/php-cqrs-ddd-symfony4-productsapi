<?php

namespace ProductsAPI\Aplication\Product\Command\Delete;

use ProductsAPI\Domain\Product\Model\ProductId;

class DeleteProductCommandHandler
{
    /**@var DeleteProductService */
    private $service;

    /**
     * DeleteProductCommandHandler constructor.
     * @param DeleteProductService $service
     */
    public function __construct(DeleteProductService $service)
    {
        $this->service = $service;
    }

    public function handle(DeleteProductCommand $command)
    {
        $this->service->delete(
            new ProductId($command->getId())
        );
    }
}