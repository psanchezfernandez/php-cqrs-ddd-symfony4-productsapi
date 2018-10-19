<?php

namespace ProductsAPI\Domain\Product\Model;


interface ProductRepository
{
    public function add(Product $product);
    public function update(Product $product);
    public function findByProductId(ProductId $productId): Product;
    public function delete(ProductId $productId);
    public function count();

}