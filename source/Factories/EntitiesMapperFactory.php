<?php namespace Importer\Factories;

use Doctrine\ORM\EntityManagerInterface;
use Importer\Mappers\EntitiesMapper;
use Importer\Mappers\IEntitiesMapper;
use Importer\Mappers\IEntityMapper;

class EntitiesMapperFactory implements IEntitiesMapperFactory
{
    public static function make(EntityManagerInterface $entityManager, IEntityMapper $entityMapper): IEntitiesMapper
    {
        return new EntitiesMapper($entityManager, $entityMapper);
    }
}