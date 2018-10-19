<?php

namespace ProductsAPI\Domain\Product\Model;

use ProductsAPI\Domain\Product\Model\Interfaces\Aggregate;

final class Product implements Aggregate
{

    /** @var ProductId */
    private $productId;
    /** @var ProductName */
    private $productName;
    /** @var ProductDescription */
    private $productDescription;
    /** @var float */
    private $productPrice;
    /** @var int */
    private $productStock;
    /**
     * Products constructor.
     * @param ProductId $productId
     * @param ProductName $productName
     * @param ProductDescription $productDescription
     * @param float $productPrice
     */
    public function __construct(ProductId $productId, ProductName $productName, ProductDescription $productDescription, float $productPrice, int $productStock)
    {
        $this->productId = $productId;
        $this->productName = $productName;
        $this->productDescription = $productDescription;
        $this->productPrice = $productPrice;
        $this->productStock= $productStock;
    }

    public static function reconstituteFrom()
    {

    }

    /**
     * @return ProductId
     */
    public function getProductId(): ProductId
    {
        return $this->productId;
    }

    /**
     * @return ProductName
     */
    public function getProductName(): ProductName
    {
        return $this->productName;
    }

    /**
     * @return ProductDescription
     */
    public function getProductDescription(): ProductDescription
    {
        return $this->productDescription;
    }

    /**
     * @return float
     */
    public function getProductPrice(): float
    {
        return $this->productPrice;
    }

    /**
     * @return int
     */
    public function getProductStock(): int
    {
        return $this->productStock;
    }


}