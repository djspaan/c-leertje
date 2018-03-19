<?php namespace Importer\Mappers;

use Importer\IClient;

class EntityMapper implements IEntityMapper
{
    private $client;

    private $entityClass;

    private $entityManager;

    public function __construct(IClient $client, string $entityClass)
    {
        $this->client = $client;
        $this->entityClass = $entityClass;
    }

    public function map(array $importedAttributes)
    {
        $config = $this->client->getConfig('imports.php')[$this->entityClass]['attributes'];

        $entity = $this->getEntityObject($importedAttributes);

        // TODO: Factory gebruiken
        foreach ($config as $column => $property) {
            $setter = $this->getSetterFromProperty($property);
            if (method_exists($entity, $setter) && array_key_exists($column, $importedAttributes)) {
                $entity->$setter($importedAttributes[$column]);
            }
        }

        return $entity;
    }

    public function getEntityClass()
    {
        return $this->entityClass;
    }

    public function setEntityClass($entityClass)
    {
        $this->entityClass = $entityClass;
    }

    protected function getSetterFromProperty(string $camelCaseProperty): string
    {
        $pascalCaseProperty = strtoupper($camelCaseProperty[0]) . substr($camelCaseProperty, 1);

        return 'set' . $pascalCaseProperty;
    }

    protected function getEntityObject(array $attributes)
    {
        $config = $this->client->getConfig('imports.php');

        $uniqueColumn = $config[$this->entityClass]['uniqueColumn'];

        $uniqueProperty = $config[$this->entityClass]['attributes'][$uniqueColumn];

        $entityObject = $this->client->getEntityManager()->getRepository($this->entityClass)
                ->findOneBy([$uniqueProperty => $attributes[$uniqueColumn]]) ?? new $this->entityClass();

        return $entityObject;
    }
}