<?php

use Importer\Entities\Product;
use Importer\Mappers\EntityMapper;
use PHPUnit\Framework\TestCase;

class EntityMapperTest extends TestCase
{
    public function _testMap()
    {
        // TODO HENRY: Hoe hier Client singleton vervangen

        // TODO HENRY: Hoe protected functie getEntityObject testen?

        $entityManagerMock = $this->createMock(\Doctrine\ORM\EntityManager::class, ['getRepository']);

        $entityManagerMock->expects($this->once())->method('getRepository')->with($this->equalTo(Product::class))->will($this->returnValue(null));

        $entityMapper = new EntityMapper(Product::class, $entityManagerMock);

        $actualEntityObject = $entityMapper->map([
            'Sku' => 1234,
            'Name' => 'Testname',
            'PrIce' => 'Testprice',
            'ShortDescription' => 'This is a short test description.',
            'FullDescription' => 'This is a full test description.',
            'Brand' => 'TestBrand',
            'Model' => 'TestModel'
        ]);

        $expectedEntityObject = new Product();
        $expectedEntityObject->setSku(1234);
        $expectedEntityObject->setName('Testname');
        $expectedEntityObject->setPrice('Testprice');
        $expectedEntityObject->setShortDescription('This is a short test description.');
        $expectedEntityObject->setFullDescription('This is a full test description.');
        $expectedEntityObject->setBrand('TestBrand');
        $expectedEntityObject->setModel('TestModel');

        $this->assertEquals('setTestProperty', $actualEntityObject);
    }
}