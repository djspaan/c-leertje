<?php namespace Importer\Factories;

use Doctrine\ORM\EntityManagerInterface as IEntityManager;
use Importer\Mappers\IEntitiesMapper;
use Importer\Mappers\IEntityMapper;

interface IEntitiesMapperFactory
{
    public static function make(IEntityManager $entityManager, IEntityMapper $entityMapper): IEntitiesMapper;
}