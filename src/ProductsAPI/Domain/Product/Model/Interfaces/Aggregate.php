<?php

namespace ProductsAPI\Domain\Product\Model\Interfaces;


interface Aggregate
{
    public function getEvents();
    public function getAggregateId():AggregateId;
    public function reconstituteFrom(AggregateHistory $aggregateHistory):Aggregate;


}