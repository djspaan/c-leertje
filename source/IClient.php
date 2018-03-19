<?php namespace Importer;

use Doctrine\ORM\EntityManagerInterface as IEntityManager;

interface IClient
{
    public function getConfig(string $configFile);

    public function getEntityManager(): IEntityManager;

    public function setEntityManager(IEntityManager $entityManager);

    public static function getInstance(): self;
}
