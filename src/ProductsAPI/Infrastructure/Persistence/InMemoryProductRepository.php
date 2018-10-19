<?php

namespace ProductsAPI\Infrastructure\Persistence;

use ProductsAPI\Domain\Product\Model\Product;
use ProductsAPI\Domain\Product\Model\ProductId;
use ProductsAPI\Domain\Product\Model\ProductRepository;

class InMemoryProductRepository implements ProductRepository
{
    /**
     * @var Product[]
     */
    private $products = [];

    public function add(Product $product)
    {
        $this->products[$product->getProductId()->getValue()->toString()] = $product;
    }

    public function update(Product $product)
    {
        $this->products[$product->getProductId()->getValue()->toString()] = $product;
    }

    public function findByProductId(ProductId $productId): Product
    {
        return $this->products[$productId->getValue()->toString()];
    }

    public function count()
    {
        return count($this->products);
        
    }

    public function delete(ProductId $productId)
    {
        unset($this->products[$productId->getValue()->toString()]);
    }

}