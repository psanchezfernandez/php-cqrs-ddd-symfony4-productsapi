<?php

namespace ProductsAPI\Domain\Product\Model\Events;

class ProductWasFound implements DomainEvent
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

    private $ocurredOn;


    /**
     * AddProductCommand constructor.
     * @param string $id
     * @param string $name
     * @param string $description
     * @param float $price
     * @param int $stock
     * @throws \Exception
     */
    public function __construct(string $id, string $name, string $description, float $price, int $stock)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->stock =$stock;
        $this->ocurredOn= (new \DateTimeImmutable())->getTimestamp();
    }


    public function getOcurredOn()
    {
        return $this->ocurredOn;
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