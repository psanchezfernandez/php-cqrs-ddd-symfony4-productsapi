<?php

namespace ProductsAPI\Domain\Product\Model;

use ProductsAPI\Domain\Product\Model\Exceptions\InvalidProductDescription;

class ProductDescription
{
    /** @var string */
    private $description;

    /**
     * ProductDescription constructor.
     * @param string $description
     * @throws InvalidProductDescription
     */
    public function __construct(string $description)
    {
        $this->guardCommentIsNotEmpty($description);
        $this->guardCommentIsLimit($description);
        $this->description = $description;
    }

    private function guardCommentIsNotEmpty($description)
    {
        if(empty($description)){
            throw new InvalidProductDescription();
        }
    }

    private function guardCommentIsLimit($description)
    {
        if((strlen($description)>=300)){
            throw new InvalidProductDescription();
        }
    }
}