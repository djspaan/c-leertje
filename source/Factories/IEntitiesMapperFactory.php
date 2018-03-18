<?php namespace Importer\Factories;

use Doctrine\ORM\EntityManagerInterface;
use Importer\Mappers\IEntitiesMapper;
use Importer\Mappers\IEntityMapper;

interface IEntitiesMapperFactory
{
    public static function make(EntityManagerInterface $entityManager, IEntityMapper $entityMapper): IEntitiesMapper;
}