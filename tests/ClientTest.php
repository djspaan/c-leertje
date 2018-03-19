<?php

use Doctrine\ORM\EntityManagerInterface as IEntityManager;
use Importer\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    private $entityManager;

    private $subject;

    public function setUp()
    {
        parent::setUp();

        $this->entityManager = $this->createMock(IEntityManager::class);
        $this->subject = Client::class;
    }

    public function testSetAndGetEntityManager()
    {
        $client = $this->subject::getInstance();

        $client->setEntityManager($this->entityManager);

        $this->assertInstanceOf(IEntityManager::class, $client->getEntityManager());
    }

    public function testGetInstance()
    {
        $client = $this->subject::getInstance();

        $this->assertInstanceOf(Client::class, $client);
    }
}