<?php

namespace ProductsAPI\Aplication\Product\Command\Update;

class UpdateProductCommand
{
    /** @var string */
    private $id;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var float */
    private $price;
    /** @var int */
    private $stock;
    /**
     * AddProductCommand constructor.
     * @param string $id
     * @param string $name
     * @param string $description
     * @param float $price
     */public function __construct(string $id, string $name, string $description, float $price, int $stock)
{
    $this->id = $id;
    $this->name = $name;
    $this->description = $description;
    $this->price = $price;
    $this->stock =$stock;
}

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getStock(): int
    {
        return $this->stock;
    }
}