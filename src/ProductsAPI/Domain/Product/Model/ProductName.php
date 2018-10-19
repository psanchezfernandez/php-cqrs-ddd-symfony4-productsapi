<?php

namespace ProductsAPI\Domain\Product\Model;

use ProductsAPI\Domain\Product\Model\Exceptions\InvalidProductName;

class ProductName
{
    /** @var string */
    private $name;


    /**
     * @param string $name
     * @throws InvalidProductName
     */
    public function __construct(string $name)
    {
        $this->guardNameIsNotEmpty($name);
        $this->name = $name;
    }


    private function guardNameIsNotEmpty($name)
    {
        if (empty($name)) {
            throw new InvalidProductName();
        }
    }
}