<?php

namespace ProductsAPI\Aplication\Product\Command\Add;

use ProductsAPI\Domain\Product\Model\Product;
use ProductsAPI\Domain\Product\Model\ProductRepository;

class AddProductService
{
    /**@var ProductRepository */
    private $productRepository;

    /**
     * AddProductService constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function add(Product $product)
    {
        $this->productRepository->add($product);


    }
}