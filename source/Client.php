<?php namespace Importer;

use Doctrine\ORM\EntityManagerInterface;

class Client
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

    public static function getConfig(string $config)
    {
        return include(__DIR__ . '/../config/' . $config . '.php');
    }

    public static function getEntityManager(): EntityManagerInterface
    {
        return self::$entityManager;
    }

    public static function setEntityManager(EntityManagerInterface $entityManager)
    {
        static::$entityManager = $entityManager;
    }

    public static function getInstance(): self
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;
        }

        return static::$instance;
    }
}