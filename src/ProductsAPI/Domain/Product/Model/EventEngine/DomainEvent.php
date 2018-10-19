<?php

namespace ProductsAPI\Domain\Product\Model\EventEngine;


interface DomainEvent
{
    /**
     * @return AggregateId
     */
    public function getAggregateId();
}