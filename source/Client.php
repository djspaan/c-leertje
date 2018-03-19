<?php namespace Importer;

use Doctrine\ORM\EntityManagerInterface as IEntityManager;

class Client implements IClient
{
    protected static $instance;

    protected static $entityManager;

    protected function __construct()
    {
        //
    }

    protected function __clone()
    {
        //
    }

    public function getConfig(string $configFile)
    {
        return include(__DIR__ . '/../config/' . $configFile);
    }

    public function getEntityManager(): IEntityManager
    {
        return self::$entityManager;
    }

    public function setEntityManager(IEntityManager $entityManager)
    {
        static::$entityManager = $entityManager;
    }

    public static function getInstance(): IClient
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;
        }

        return static::$instance;
    }
}