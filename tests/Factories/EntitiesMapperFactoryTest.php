<?php

use Doctrine\ORM\EntityManagerInterface as IEntityManager;
use Importer\Factories\EntitiesMapperFactory;
use Importer\Mappers\EntitiesMapper;
use Importer\Mappers\IEntityMapper;
use PHPUnit\Framework\TestCase;

class EntitiesMapperFactoryTest extends TestCase
{
    private $entityManager;

    private $entityMapper;

    private $subject;

    public function setUp()
    {
        parent::setUp();

        $this->entityManager = $this->createMock(IEntityManager::class);

        $this->entityMapper = $this->createMock(IEntityMapper::class);

        $this->subject = EntitiesMapperFactory::class;
    }

    public function testIfMakeReturnsTheCorrectFactory()
    {
        $entitiesMapper = $this->subject::make($this->entityManager, $this->entityMapper);

        $this->assertInstanceOf(EntitiesMapper::class, $entitiesMapper);
    }

}