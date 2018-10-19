<?php

namespace youtrack\core;

interface EntityFactoryInterface
{

    /**
     * Создать объект сущности
     * @param array $data
     * @return EntityInterface
     */
    public function create(array $data): EntityInterface;
}