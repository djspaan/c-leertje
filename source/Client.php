<?php namespace Importer;

use Doctrine\ORM\EntityManager;

class Client
{
    public static $instance;

    protected static $entityManager;

    protected function __construct()
    {
        //
    }

    protected function __clone()
    {
        //
    }

    public static function config()
    {
        // TODO
    }

    public static function getEntityManager(): EntityManager
    {
        return self::$entityManager;
    }

    public static function setEntityManager(EntityManager $entityManager)
    {
        static::$entityManager = $entityManager;
    }

    public static function get(): self
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;
        }

        return static::$instance;
    }
}