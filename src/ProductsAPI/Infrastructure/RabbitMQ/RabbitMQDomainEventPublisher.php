<?php

namespace ProductsAPI\Infrastructure\RabbitMQ;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use ProductsAPI\Aplication\Product\Command\Add\AddProductCommand;
use ProductsAPI\Domain\Product\Model\Product;
use ProductsAPI\Domain\Product\Model\ProductDescription;
use ProductsAPI\Domain\Product\Model\ProductId;
use ProductsAPI\Domain\Product\Model\ProductName;
use Ramsey\Uuid\Uuid;

define('RABBITMQ_HOST', 'localhost');
define('RABBITMQ_PORT', '5672');
define('RABBITMQ_USERNAME', 'guest');
define('RABBITMQ_PASSWORD', 'guest');
define('EXCHANGE_NAME', 'logs');
class RabbitMQDomainEventPublisher
{

    private $connection;

    public function __construct()
    {

        $this->connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
    }

    public function publish()
    {
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();

        $channel->queue_declare('email_queue2', false, false, false, false);
        $uuid=Uuid::uuid4()->toString();
        $command = new AddProductCommand($uuid,"Ratón","Raton de ordenador",12.12,2);
        $product= new Product(
            new ProductId($command->getId()),
            new ProductName($command->getName()),
            new ProductDescription($command->getDescription()),
            $command->getPrice(),
            $command->getStock()
        );
        $data = serialize($product);

        $msg = new AMQPMessage($data, array('delivery_mode' => 2));
        $channel->basic_publish($msg, '', 'email_queue2');



    }

}