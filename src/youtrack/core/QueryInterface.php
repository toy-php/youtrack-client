<?php

namespace youtrack\core;

interface QueryInterface
{

    /**
     * Запрашиваемые поля
     * @param string $fields
     * @return QueryInterface
     */
    public function fields(string $fields): QueryInterface;

    /**
     * Фильтрующий запрос
     * @param string $query
     * @return QueryInterface
     */
    public function query(string $query): QueryInterface;

    /**
     * Пропустить количество сущностей в выборке
     * @param int $skip
     * @return QueryInterface
     */
    public function skip(int $skip): QueryInterface;

    /**
     * Ограничит количество сущностей в выборке
     * @param int $top
     * @return QueryInterface
     */
    public function top(int $top): QueryInterface;

    /**
     * Получить массив сущностей
     * @return array | EntityInterface[]
     */
    public function all(): array;

    /**
     * Получить одну сущность
     * @param string $id
     * @return EntityInterface
     */
    public function one(string $id): EntityInterface;

}