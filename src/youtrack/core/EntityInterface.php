<?php

namespace youtrack\core;

interface EntityInterface
{

    /**
     * Изменение данных объекта по имени с помощью функции сеттера
     * @param $name
     * @param $value
     * @return void
     * @throws UnknownPropertyException
     */
    public function __set($name, $value): void;

    /**
     * Обнуление данных объекта по имени с помощью функции сеттера
     * @param $name
     * @throws UnknownPropertyException
     */
    public function __unset($name): void;

    /**
     * Получение данных объекта по имени с помощью функции геттера
     * @param string $name
     * @return mixed
     * @throws UnknownPropertyException
     */
    public function __get(string $name);

    /**
     * Проверка наличия свойств или данных объекта по имени
     * @param string $name
     * @return bool
     */
    public function __isset(string $name);

}