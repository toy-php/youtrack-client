<?php

namespace youtrack\core;

class EntityFactory implements EntityFactoryInterface
{

    protected $entityClass;

    /**
     * EntityFactory constructor.
     * @param string $entityClass
     */
    public function __construct(string $entityClass)
    {
        $this->entityClass = $entityClass;
    }

    /**
     * Создать объект сущности
     * @param array $data
     * @return EntityInterface
     * @throws Exception
     */
    public function create(array $data): EntityInterface
    {
        $entityClass = $this->entityClass;
        if (!class_exists($entityClass)) {
            throw new Exception(sprintf('Класс "%s" не доступен', $entityClass));
        }
        $entity = new $entityClass;
        foreach ($data as $key => $value) {
            if (substr($key, 0, 1) === '$') {
                continue;
            }
            if (is_array($value)) {
                if (isset($value['$type'])) {
                    $entity->$key = $this->createRelatedEntity($value);
                    continue;
                }
                if (count($value) !== count($value, COUNT_RECURSIVE)) {
                    $relatedEntities = [];
                    foreach ($value as $item) {
                        $relatedEntities[] = $this->createRelatedEntity($item);
                    }
                    $entity->$key = $relatedEntities;
                    continue;
                }
            }

            $entity->$key = $value;
        }
        return $entity;
    }

    /**
     * Создание относительной сущности
     * @param array $data
     * @return EntityInterface
     */
    protected function createRelatedEntity(array $data): EntityInterface
    {
        $explodedKey = explode('.', $data['$type']);
        $relatedEntity = 'youtrack\entity\\' . end($explodedKey);
        $factory = new static($relatedEntity);
        return $factory->create($data);
    }
}