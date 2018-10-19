<?php

namespace ProductsAPI\Aplication\Product\Query\FindById;

class FindByIdProductQuery
{

    /** @var string */
    private $id;

    /**
     * FindByIdProductQuery constructor.
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }
}