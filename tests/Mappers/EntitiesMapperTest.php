<?php

use Doctrine\ORM\EntityManager;
use Importer\Entities\Product;
use Importer\Mappers\EntityMapper;
use Importer\Mappers\IEntityMapper;
use Importer\Readers\IImportedData;
use PHPUnit\Framework\TestCase;

class EntitiesMapperTest extends TestCase
{
    public function _testMap()
    {
        $entityManagerMock = $this->createMock(EntityManager::class);

        $entityMapperStub = $this->createMock(IEntityMapper::class);

        $expectedEntityObject = new Product();
        $expectedEntityObject->setSku(1234);
        $expectedEntityObject->setName('Testname');
        $expectedEntityObject->setPrice(10.1);
        $expectedEntityObject->setShortDescription('This is a short test description.');
        $expectedEntityObject->setFullDescription('This is a full test description.');
        $expectedEntityObject->setBrand('TestBrand');
        $expectedEntityObject->setModel('TestModel');

        $entityMapperStub->expects($this->any())->method('map')->will($this->returnValue($expectedEntityObject));

        $entitiesMapper = new \Importer\Mappers\EntitiesMapper($entityManagerMock, $entityMapperStub);

        $importedDataStub = $this->createMock(IImportedData::class);

        $importedDataStub->expects($this->any())->method('getItems')->willReturnArgument([
            'Sku' => 1234,
            'Name' => 'Testname',
            'PrIce' => 'Testprice',
            'ShortDescription' => 'This is a short test description.',
            'FullDescription' => 'This is a full test description.',
            'Brand' => 'TestBrand',
            'Model' => 'TestModel'
        ]);

        $entitiesMapper->map($importedDataStub);

        // TODO HENRY: Expect entityManagerMock to receive merge and flush calls.
    }
}