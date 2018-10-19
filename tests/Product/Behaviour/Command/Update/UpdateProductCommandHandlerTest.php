<?php

namespace ProductsAPI\Tests\Product\Behaviour\Command\Update;

use Mockery;
use ProductsAPI\Aplication\Product\Command\Update\UpdateProductCommand;
use ProductsAPI\Aplication\Product\Command\Update\UpdateProductCommandHandler;
use ProductsAPI\Aplication\Product\Command\Update\UpdateProductService;
use ProductsAPI\Domain\Product\Model\Product;
use ProductsAPI\Domain\Product\Model\ProductDescription;
use ProductsAPI\Domain\Product\Model\ProductId;
use ProductsAPI\Domain\Product\Model\ProductName;
use ProductsAPI\Domain\Product\Model\ProductRepository;
use ProductsAPI\Tests\ProductsTestCase;
use Ramsey\Uuid\Uuid;

class UpdateProductCommandHandlerTest extends ProductsTestCase
{

    /** @test */
    public function shouldUpdateProduct()
    {
        $uuid=Uuid::uuid4()->toString();
        $command = new UpdateProductCommand($uuid,"Ratón","Raton de ordenador",12.12,2);
        $productRepository= Mockery::mock(ProductRepository::class );
        $updateProduct= new Product(
            new ProductId($command->getId()),
            new ProductName($command->getName()),
            new ProductDescription($command->getDescription()),
            $command->getPrice(),
            $command->getStock()
        );
        $commandHandler=new UpdateProductCommandHandler(new UpdateProductService($productRepository));
        $productRepository->shouldReceive('update')->with(\Hamcrest\Core\IsEqual::equalTo($updateProduct));
        $commandHandler->handle($command);

    }
}