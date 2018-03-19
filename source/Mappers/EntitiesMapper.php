<?php namespace Importer\Mappers;

use Doctrine\ORM\EntityManagerInterface as IEntityManager;
use Importer\Readers\IImportedData;

class EntitiesMapper implements IEntitiesMapper
{
    protected $entityManager;

    protected $entityMapper;

    public function __construct(IEntityManager $entityManager, IEntityMapper $entityMapper)
    {
        $this->entityManager = $entityManager;
        $this->entityMapper = $entityMapper;
    }

    public function map(IImportedData $importedData): void
    {
        $productRows = $importedData->getItems();

        foreach ($productRows as $row) {
            $this->entityManager->merge($this->entityMapper->map($row));
        }

        $this->entityManager->flush();
    }
}