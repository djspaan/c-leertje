<?php namespace Importer\Mappers;

use Doctrine\ORM\EntityManagerInterface;
use Importer\Client;

class EntityMapper implements IEntityMapper
{
    protected $entity;

    protected $entityManager;

    public function __construct(string $entity, EntityManagerInterface $entityManager)
    {
        $this->entity = $entity;
        $this->entityManager = $entityManager;
    }

    public function map(array $importedAttributes)
    {
        $config = Client::getConfig('imports')[$this->entity]['attributes'];

        $entity = $this->getEntityObject($importedAttributes);

        foreach ($config as $column => $property) {
            $setter = $this->getSetterFromProperty($property);
            if (method_exists($entity, $setter) && array_key_exists($column, $importedAttributes)) {
                $entity->$setter($importedAttributes[$column]);
            }
        }

        return $entity;
    }

    public function getEntity()
    {
        return $this->entity;
    }

    public function setEntity($entity)
    {
        $this->entity = $entity;
    }

    protected function getSetterFromProperty(string $camelCaseProperty): string
    {
        $pascalCaseProperty = strtoupper($camelCaseProperty[0]) . substr($camelCaseProperty, 1);

        return 'set' . $pascalCaseProperty;
    }

    protected function getEntityObject(array $attributes)
    {
        $config = Client::getConfig('imports');

        $uniqueColumn = $config[$this->entity]['uniqueColumn'];

        $uniqueProperty = $config[$this->entity]['attributes'][$uniqueColumn];

        $entityObject = $this->entityManager->getRepository($this->entity)
                ->findOneBy([$uniqueProperty => $attributes[$uniqueColumn]]) ?? new $this->entity();

        return $entityObject;
    }
}