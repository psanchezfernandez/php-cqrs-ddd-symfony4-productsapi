<?php

namespace ProductsAPI\Controller;

use ProductsAPI\Infrastructure\RabbitMQ\RabbitMQDomainEventPublisher;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{

    public function rabbit()
    {
        $rabbit= new RabbitMQDomainEventPublisher();
        $rabbit->publish();
        die();
    }
}