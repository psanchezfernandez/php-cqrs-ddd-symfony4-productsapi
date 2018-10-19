<?php

namespace ProductsAPI\Tests\Product\Integration\InMemory;

use ProductsAPI\Domain\Product\Model\Product;
use ProductsAPI\Domain\Product\Model\ProductDescription;
use ProductsAPI\Domain\Product\Model\ProductId;
use ProductsAPI\Domain\Product\Model\ProductName;
use ProductsAPI\Infrastructure\Persistence\InMemoryProductRepository;
use ProductsAPI\Tests\ProductsTestCase;
use Ramsey\Uuid\Uuid;

class InMemoryProductRepositoryTest extends ProductsTestCase
{
    /** @var InMemoryProductRepository */
    private $productRepository;

    public function setUp()
    {
        $this->productRepository=new InMemoryProductRepository();

    }
    /** @test */
    public function shouldAddAndFindProduct()
    {
        $uuid=Uuid::uuid4()->toString();
        $product= new Product(
            new ProductId($uuid),
            new ProductName("Ratón"),
            new ProductDescription("Raton de ordenador"),
            12.12,
            2
        );

        $this->productRepository->add($product);
        $this->assertEquals(1, $this->productRepository->count());
        $this->assertEquals($product, $this->productRepository->findByProductId( new ProductId($uuid)));
    }


    /** @test */
    public function shouldDeleteProduct()
    {
        $uuid=Uuid::uuid4()->toString();
        $product= new Product(
            new ProductId($uuid),
            new ProductName("Ratón"),
            new ProductDescription("Raton de ordenador"),
            12.12,
            2
        );

        $this->productRepository->add($product);
        $this->productRepository->delete($product->getProductId());
        $this->assertEquals(0, $this->productRepository->count());

    }

    /** @test */
    public function shouldUpdateProduct()
    {
        $uuid=Uuid::uuid4()->toString();
        $product= new Product(
            new ProductId($uuid),
            new ProductName("Ratón"),
            new ProductDescription("Raton de ordenador"),
            12.12,
            2
        );

        $this->productRepository->add($product);

        $updateProduct= new Product(
            new ProductId($uuid),
            new ProductName("Ratón Gamer"),
            new ProductDescription("Raton de ordenador"),
            12.12,
            2
        );

        $this->productRepository->update($updateProduct);
        $returnProduct=$this->productRepository->findByProductId($product->getProductId());
        $this->assertNotEquals($returnProduct,$product);
        $this->assertNotEquals($returnProduct->getProductName(),$product->getProductName());

    }

}