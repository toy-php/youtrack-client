<?php

namespace youtrack\core;

trait Aggregate
{
    /**
     * Имя ресурса агрегата
     * @return string
     */
    abstract static public function resource(): string;

    /**
     * Получить объект запроса
     * @return QueryInterface
     * @throws Exception
     */
    static public function find(): QueryInterface
    {
        return new Query(Api::getInstance(), new EntityFactory(get_called_class()), static::resource());
    }
}