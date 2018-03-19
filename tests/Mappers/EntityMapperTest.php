<?php

use Doctrine\Common\Persistence\ObjectRepository as IObjectRepository;
use Doctrine\ORM\EntityManagerInterface as IEntityManager;
use Importer\Entities\Product;
use Importer\IClient;
use Importer\Mappers\EntityMapper;
use PHPUnit\Framework\TestCase;

class EntityMapperTest extends TestCase
{
    private $client;

    private $entityManager;

    private $repository;

    private $subject;

    private $config = [
        'Importer\Entities\Product' =>  [
            'uniqueColumn' => 'Sku',
            'attributes' => [
                'Sku' => 'sku',
                'Name' => 'name',
                'PrIce' => 'price',
                'ShortDescription' => 'shortDescription',
                'FullDescription' => 'fullDescription',
                'Brand' => 'brand',
                'Model' => 'model'
            ]
        ]
    ];

    public function setUp()
    {
        parent::setUp();

        $this->client = $this->createMock(IClient::class);
        $this->entityManager = $this->createMock(IEntityManager::class);
        $this->repository = $this->createMock(IObjectRepository::class);
        $this->subject = new EntityMapper($this->client, Product::class);
    }

    public function testMap()
    {
        $this->client->expects($this->any())->method('getConfig')->with($this->equalTo('imports.php'))->will($this->returnValue($this->config));

        $this->client->expects($this->once())->method('getEntityManager')->will($this->returnValue($this->entityManager));

        $this->entityManager->expects($this->once())->method('getRepository')->with($this->equalTo(Product::class))->will($this->returnValue($this->repository));

        $this->repository->expects($this->once())->method('findOneBy')->with($this->equalTo(['sku' => '1234']))->will($this->returnValue(null));

        $actualProduct = $this->subject->map(['Sku' => '1234']);

        $expectedProduct = new Product();

        $expectedProduct->setSku('1234');

        $this->assertEquals($expectedProduct, $actualProduct);
    }
}