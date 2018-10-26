<?php

namespace youtrack\core;

abstract class Entity extends BaseObject implements EntityInterface
{

    protected $data = [];

    /**
     * @inheritdoc
     */
    public function __get(string $name)
    {
        try {
            return parent::__get($name);
        } catch (UnknownPropertyException $exception) {
            if (isset($this->data[$name])) {
                return is_array($this->data[$name]) ? new ActiveArray(&$this->data[$name]) : $this->data[$name];
            }
            throw $exception;
        }
    }

    /**
     * @inheritdoc
     */
    public function __set($name, $value): void
    {
        try {
            parent::__set($name, $value);
        } catch (UnknownPropertyException $exception) {
            $this->data[$name] = $value;
        }
    }

    /**
     * @inheritdoc
     */
    public function __isset(string $name)
    {
        return parent::__isset($name) or isset($this->data[$name]);
    }

    /**
     * @inheritdoc
     */
    public function __unset($name): void
    {
        try{
            parent::__unset($name);
        }catch (UnknownPropertyException $exception){
            unset($this->data[$name]);
        }
    }
}