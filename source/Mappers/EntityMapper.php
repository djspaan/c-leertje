<?php namespace Importer\Mappers;

use Doctrine\ORM\EntityManager;

class EntityMapper implements IEntityMapper
{
    protected $entity;

    protected $entityManager;

    public function __construct(string $entity, EntityManager $entityManager)
    {
        $this->entity = $entity;
        $this->entityManager = $entityManager;
    }

    protected function getEntityImportConfig()
    {
        $config = include(__DIR__ . '/../../config/imports.php');

        return $config[$this->entity]['attributes'];
    }

    protected function getSetterFromProperty(string $property): string
    {
        $pascalCaseProperty = strtoupper($property[0]) . substr($property, 1);

        return 'set' . $pascalCaseProperty;
    }

    protected function getEntityObject(array $attributes)
    {
        $config = include(__DIR__ . '/../../config/imports.php');

        $uniqueColumn = $config[$this->entity]['uniqueColumn'];

        $uniqueProperty = $config[$this->entity]['attributes'][$uniqueColumn];

        $entityObject = $this->entityManager->getRepository($this->entity)
                ->findOneBy([$uniqueProperty => $attributes[$uniqueColumn]]) ?? new $this->entity();

        return $entityObject;
    }

    public function map(array $attributes)
    {
        $config = $this->getEntityImportConfig();

        $entity = $this->getEntityObject($attributes);

        foreach ($config as $column => $property) {
            $setter = $this->getSetterFromProperty($property);
            if (method_exists($entity, $setter) && array_key_exists($column, $attributes)) {
                $entity->$setter($attributes[$column]);
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
}