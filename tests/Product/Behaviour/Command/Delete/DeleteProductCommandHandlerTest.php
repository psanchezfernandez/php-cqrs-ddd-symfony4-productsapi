<?php

namespace ProductsAPI\Tests\Product\Behaviour\Command\Delete;

use Mockery;
use ProductsAPI\Aplication\Product\Command\Delete\DeleteProductCommand;
use ProductsAPI\Aplication\Product\Command\Delete\DeleteProductCommandHandler;
use ProductsAPI\Aplication\Product\Command\Delete\DeleteProductService;
use ProductsAPI\Domain\Product\Model\ProductId;
use ProductsAPI\Domain\Product\Model\ProductRepository;
use ProductsAPI\Tests\ProductsTestCase;
use Ramsey\Uuid\Uuid;

class DeleteProductCommandHandlerTest extends ProductsTestCase
{

    /** @test */
    public function shouldDeleteProduct()
    {
        $uuid=Uuid::uuid4()->toString();
        $command = new DeleteProductCommand($uuid);
        $productRepository= Mockery::mock(ProductRepository::class );
        $producId=new ProductId($command->getId());
        $commandHandler=new DeleteProductCommandHandler(new DeleteProductService($productRepository));
        $productRepository->shouldReceive('delete')->with(\Hamcrest\Core\IsEqual::equalTo($producId))->andReturnNull();
        $commandHandler->handle($command);

    }

}