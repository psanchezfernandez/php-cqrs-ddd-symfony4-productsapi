<?php

namespace ProductsAPI\Domain\Product\Model;

use ProductsAPI\Domain\Product\Model\EventEngine\AggregateId;
use ProductsAPI\Domain\Product\Model\Exceptions\InvalidProductId;
use Ramsey\Uuid\Uuid;


class ProductId  implements AggregateId
{
    /** @var \Ramsey\Uuid\UuidInterface */
    private $id;
    /** @var string */
    private $value;

    /**
     * @param string $id
     * @throws InvalidProductId
     */
    public function __construct(string $id)
    {
        $this->guardIdIsAValidUuid($id);
        $this->id = Uuid::fromString($id);
        $this->value = $id;
    }

    public function getValue()
    {
        return $this->id;
    }
    private function guardIdIsAValidUuid(string $id)
    {
        if (!Uuid::isValid($id)) {
            throw new InvalidProductId();
        }
    }

    public function __toString()
    {
        return $this->id;
    }

    public static function generate()
    {
        return new UserId(Uuid::uuid4()->toString());
    }

}