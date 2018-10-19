<?php

namespace ProductsAPI\Domain\Product\Model\EventEngine;


interface AggregateId
{
    /**
     * @return string
     */
    public function __toString();
    /**
     * @return AggregateId
     */
    public static function generate();
}