<?php namespace Importer\Mappers;

use Doctrine\ORM\EntityManagerInterface as IEntityManager;
use Importer\Readers\IImportedData;

interface IEntitiesMapper
{
    public function __construct(IEntityManager $entityManager, IEntityMapper $entityMapper);

    public function map(IImportedData $importedData): void;
}