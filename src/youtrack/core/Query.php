<?php

namespace youtrack\core;

use function GuzzleHttp\Psr7\build_query;
use Psr\Http\Message\UriInterface;

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

    protected function createUri(array $params): UriInterface
    {
        $query = build_query($this->queryConfig);
        $resource = preg_replace('#\{[\w]+\}#iu', '', str_replace (array_map(function ($key){
            return '{' . $key . '}';
        }, array_keys($params)), array_values($params), $this->resource));
        return $this->api->createUri(trim($resource, '/'))->withQuery($query);
    }

    /**
     * @inheritdoc
     */
    public function all(array $params = []): array
    {
        $uri = $this->createUri($params);
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
     * @param array $params
     * @return EntityInterface
     * @throws Exception
     */
    public function one(string $id, array $params = []): EntityInterface
    {
        $uri = $this->createUri(array_merge([
            'id' => $id
        ], $params));
        $response = $this->api->get($uri);
        return $this->entityFactory->create($response);
    }

}