<?php

namespace ProductsAPI\Tests\Product\Behaviour\Command\Add;

use Mockery;
use ProductsAPI\Aplication\Product\Command\Add\AddProductCommand;
use ProductsAPI\Aplication\Product\Command\Add\AddProductCommandHandler;
use ProductsAPI\Aplication\Product\Command\Add\AddProductService;
use ProductsAPI\Domain\Product\Model\Product;
use ProductsAPI\Domain\Product\Model\ProductDescription;
use ProductsAPI\Domain\Product\Model\ProductId;
use ProductsAPI\Domain\Product\Model\ProductName;
use ProductsAPI\Domain\Product\Model\ProductRepository;
use ProductsAPI\Tests\ProductsTestCase;
use Ramsey\Uuid\Uuid;

class AddProductCommandHandlerTest extends ProductsTestCase
{
    /** @test */
    public function shouldAddProduct()
    {
        $uuid=Uuid::uuid4()->toString();
        $command = new AddProductCommand($uuid,"Ratón","Raton de ordenador",12.12,2);
        $productRepository= Mockery::mock(ProductRepository::class );

        $product= new Product(
            new ProductId($command->getId()),
            new ProductName($command->getName()),
            new ProductDescription($command->getDescription()),
            $command->getPrice(),
            $command->getStock()
        );
        $commandHandler=new AddProductCommandHandler(new AddProductService($productRepository));
        $productRepository->shouldReceive('add')->with(\Hamcrest\Core\IsEqual::equalTo($product));
        $commandHandler->handle($command);

    }

    /**
     * @test
     * @expectedException \ProductsAPI\Domain\Product\Model\Exceptions\InvalidProductId
     */
    public function shouldNotAddProductOnInvalidId()
    {
        $command = new AddProductCommand("maria","Ratón","Raton de ordenador",12.12,2);
        $productRepository= Mockery::mock(ProductRepository::class );
        $commandHandler=new AddProductCommandHandler(new AddProductService($productRepository));
        $commandHandler->handle($command);

    }

    /**
     * @test
     * @expectedException \ProductsAPI\Domain\Product\Model\Exceptions\InvalidProductName
     */
    public function shouldNotAddProductOnInvalidName()
    {
        $command = new AddProductCommand("7fddae8e-8977-11e0-bc11-003048c3b1f2","","Raton de ordenador",12.12,2);
        $productRepository= Mockery::mock(ProductRepository::class );
        $commandHandler=new AddProductCommandHandler(new AddProductService($productRepository));
        $commandHandler->handle($command);

    }

    /**
     * @test
     * @expectedException \ProductsAPI\Domain\Product\Model\Exceptions\InvalidProductDescription
     */
    public function shouldNotAddProductOnInvalidDescription()
    {
        $command = new AddProductCommand("7fddae8e-8977-11e0-bc11-003048c3b1f2","Ratón","",12.12,2);
        $productRepository= Mockery::mock(ProductRepository::class );
        $commandHandler=new AddProductCommandHandler(new AddProductService($productRepository));
        $commandHandler->handle($command);

    }

}