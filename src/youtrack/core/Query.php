<?php

namespace youtrack\core;

use function GuzzleHttp\Psr7\build_query;

class Query implements QueryInterface
{

    protected $api;
    protected $entityFactory;

    protected $resource = '';
    protected $queryConfig = [];

    /**
     * Query constructor.
     * @param ApiInterface $api
     * @param EntityFactoryInterface $entityFactory
     * @param string $resource
     */
    public function __construct(ApiInterface $api, EntityFactoryInterface $entityFactory, string $resource)
    {
        $this->api = $api;
        $this->entityFactory = $entityFactory;
        $this->resource = $resource;
    }

    /**
     * Запрашиваемые поля
     * @param string $fields
     * @return QueryInterface
     */
    public function fields(string $fields): QueryInterface
    {
        $this->queryConfig['fields'] = $fields;
        return $this;
    }

    /**
     * Фильтрующий запрос
     * @param string $query
     * @return QueryInterface
     */
    public function query(string $query): QueryInterface
    {
        $this->queryConfig['query'] = $query;
        return $this;
    }

    /**
     * Пропустить количество сущностей в выборке
     * @param int $skip
     * @return QueryInterface
     */
    public function skip(int $skip): QueryInterface
    {
        $this->queryConfig['$skip'] = $skip;
        return $this;
    }

    /**
     * Ограничит количество сущностей в выборке
     * @param int $top
     * @return QueryInterface
     */
    public function top(int $top): QueryInterface
    {
        $this->queryConfig['$top'] = $top;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function all(array $params = []): array
    {
        $query = build_query($this->queryConfig);
        $resource = str_replace (array_map(function ($key){
            return '{' . $key . '}';
        }, array_keys($params)), array_values($params), $this->resource);
        $uri = $this->api->createUri(trim($resource, '/'))->withQuery($query);
        $response = $this->api->get($uri);
        $result = [];
        foreach ($response as $item) {
            $result[] = $this->entityFactory->create($item);
        }
        return $result;
    }

    /**
     * Получить одну сущность
     * @param string $id
     * @return EntityInterface
     * @throws Exception
     */
    public function one(string $id): EntityInterface
    {
        $query = build_query($this->queryConfig);
        $uri = $this->api->createUri(sprintf('%s/%s', trim($this->resource, '/'), $id))->withQuery($query);
        $response = $this->api->get($uri);
        return $this->entityFactory->create($response);
    }

}