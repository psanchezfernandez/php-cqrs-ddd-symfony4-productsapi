<?php

namespace ProductsAPI\Tests;

use Hamcrest\Core\IsEqual;
use Mockery;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class ProductsTestCase extends TestCase
{
    public static function similarTo($x)
    {
        return IsEqual::equalTo($x);
    }

    function tearDown()
    {
        parent::tearDown();

        if ($container = Mockery::getContainer()) {
            $this->addToAssertionCount($container->mockery_getExpectationCount());
        }


        Mockery::close();
    }
}