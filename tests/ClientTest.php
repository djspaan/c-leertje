<?php

use Importer\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testSetAndGetEntityManager()
    {
        $client = Client::getInstance();

        $entityManagerMock = $this->createMock(\Doctrine\ORM\EntityManagerInterface::class);

        $client::setEntityManager($entityManagerMock);

        $this->assertInstanceOf(\Doctrine\ORM\EntityManagerInterface::class, $client::getEntityManager());
    }

    public function testGetInstance()
    {
        $client = Client::getInstance();

        $this->assertInstanceOf(Client::class, $client);
    }
}