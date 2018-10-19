<?php

namespace ProductsAPI\Aplication\Product\Query\FindById;

use ProductsAPI\Domain\Product\Model\ProductId;

class FindByIdProductQueryHandler
{
    /**@var FindByIdProductService */
    private $service;

    /**
     * FindByIdProductQueryHandler constructor.
     * @param FindByIdProductService $service
     */
    public function __construct(FindByIdProductService $service)
    {
        $this->service = $service;
    }

    public function handle(FindByIdProductQuery $query)
    {
        return $this->service->findByProductId(
            new ProductId($query->getId())
        );
    }

}