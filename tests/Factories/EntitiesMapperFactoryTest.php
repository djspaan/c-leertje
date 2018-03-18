<?php

use PHPUnit\Framework\TestCase;

class EntitiesMapperFactoryTest extends TestCase
{
    public function testIfMakeReturnsTheCorrectFactory()
    {
        $entityManagerMock = $this->createMock(\Doctrine\ORM\EntityManagerInterface::class);

        $entityMapperMock = $this->createMock(\Importer\Mappers\IEntityMapper::class);

        $entitiesMapper = \Importer\Factories\EntitiesMapperFactory::make($entityManagerMock, $entityMapperMock);

        $this->assertInstanceOf(\Importer\Mappers\EntitiesMapper::class, $entitiesMapper);
    }

}