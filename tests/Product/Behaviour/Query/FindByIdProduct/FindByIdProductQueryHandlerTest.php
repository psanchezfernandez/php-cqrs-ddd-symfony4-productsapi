<?php

namespace ProductsAPI\Tests\Product\Behaviour\Query\FindByIdProduct;

use Mockery;
use ProductsAPI\Aplication\Product\Query\FindById\FindByIdProductQuery;
use ProductsAPI\Aplication\Product\Query\FindById\FindByIdProductService;
use ProductsAPI\Aplication\Product\Query\FindById\FindByIdProductQueryHandler;
use ProductsAPI\Domain\Product\Model\Product;
use ProductsAPI\Domain\Product\Model\ProductDescription;
use ProductsAPI\Domain\Product\Model\ProductId;
use ProductsAPI\Domain\Product\Model\ProductName;
use ProductsAPI\Domain\Product\Model\ProductRepository;
use ProductsAPI\Tests\ProductsTestCase;
use Ramsey\Uuid\Uuid;

class FindByIdProductQueryHandlerTest extends ProductsTestCase
{
    /** @test */
    public function shouldFindByIdProduct()
    {
        $uuid=Uuid::uuid4()->toString();
        $query = new FindByIdProductQuery($uuid);
        $productRepository= Mockery::mock(ProductRepository::class );
        $producId=new ProductId($query->getId());
        $product= new Product(
            new ProductId($uuid),
            new ProductName("Ratón"),
            new ProductDescription("Raton de ordenador"),
            12.12,
            2
        );

        $querydHandler=new FindByIdProductQueryHandler(new FindByIdProductService($productRepository));
        $productRepository->shouldReceive('findByProductId')->with(\Hamcrest\Core\IsEqual::equalTo($producId))->andReturn($product);
        $querydHandler->handle($query);

    }

}