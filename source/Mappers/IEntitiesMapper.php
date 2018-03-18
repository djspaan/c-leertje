<?php namespace Importer\Mappers;

use Doctrine\ORM\EntityManagerInterface;
use Importer\Readers\IImportedData;

interface IEntitiesMapper
{
    public function __construct(EntityManagerInterface $entityManager, IEntityMapper $entityMapper);

    public function map(IImportedData $importedData): void;
}