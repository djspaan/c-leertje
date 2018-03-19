<?php

use Doctrine\ORM\EntityManagerInterface as IEntityManager;
use Importer\Entities\Product;
use Importer\Mappers\EntitiesMapper;
use Importer\Mappers\IEntityMapper;
use Importer\Readers\IImportedData;
use PHPUnit\Framework\TestCase;

class EntitiesMapperTest extends TestCase
{
    private $entityManager;

    private $entityMapper;

    private $importedData;

    private $entity;

    private $subject;

    public function setUp()/* The :void return type declaration that should be here would cause a BC issue */
    {
        parent::setUp();

        $this->entityManager = $this->createMock(IEntityManager::class);
        $this->entityMapper = $this->createMock(IEntityMapper::class);
        $this->importedData = $importedData = $this->createMock(IImportedData::class);
        $this->entity = $this->createMock(Product::class);
        $this->subject = new EntitiesMapper($this->entityManager, $this->entityMapper);
    }

    public function testMap()
    {
        $this->importedData->expects($this->once())->method('getItems')->will($this->returnValue([['Sku' => '1234']]));

        $this->entityMapper->expects($this->once())->method('map')->with($this->equalTo(['Sku' => '1234']))->will($this->returnValue($this->entity));

        $this->entityManager->expects($this->once())->method('merge')->with($this->equalTo($this->entity));

        $this->entityManager->expects($this->once())->method('flush');

        $this->subject->map($this->importedData);
    }
}