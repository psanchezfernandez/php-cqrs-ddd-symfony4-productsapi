<?php

namespace ProductsAPI\Aplication\Product\Command\Delete;

use ProductsAPI\Domain\Product\Model\ProductId;
use ProductsAPI\Domain\Product\Model\ProductRepository;

class DeleteProductService
{

    /**@var ProductRepository */
    private $productRepository;

    /**
     * DeleteProductService constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function delete(ProductId $id)
    {
        $this->productRepository->delete($id);
    }
}