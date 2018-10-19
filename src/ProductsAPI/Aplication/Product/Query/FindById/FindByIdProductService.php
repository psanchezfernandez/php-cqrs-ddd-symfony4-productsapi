<?php

namespace ProductsAPI\Aplication\Product\Query\FindById;

use ProductsAPI\Domain\Product\Model\Events\ProductWasFound;
use ProductsAPI\Domain\Product\Model\ProductId;
use ProductsAPI\Domain\Product\Model\ProductRepository;

class FindByIdProductService
{
    /**@var ProductRepository */
    private $productRepository;

    /**
     * FindByIdProductService constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function findByProductId(ProductId $id)
    {
        $product=$this->productRepository->findByProductId($id);
        $productEvent=new ProductWasFound(
            $product->getProductId(),
            $product->getProductName(),
            $product->getProductDescription(),
            $product->getProductPrice(),
            $product->getProductStock()
         );

        return $product;
    }

}