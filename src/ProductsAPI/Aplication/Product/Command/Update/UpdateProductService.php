<?php

namespace ProductsAPI\Aplication\Product\Command\Update;

use ProductsAPI\Domain\Product\Model\Product;
use ProductsAPI\Domain\Product\Model\ProductRepository;

class UpdateProductService
{
    /**@var ProductRepository */
    private $productRepository;

    /**
     * UpdateProductService constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function update(Product $product)
    {
        $this->productRepository->update($product);
    }

}