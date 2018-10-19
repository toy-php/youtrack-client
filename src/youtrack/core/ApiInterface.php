<?php

namespace youtrack\core;

use Psr\Http\Message\UriInterface;

interface ApiInterface
{

    /**
     * Сформировать объект URI
     * @param string $path
     * @return UriInterface
     */
    public function createUri(string $path): UriInterface;

    /**
     * Сформировать и отправить GET запрос на сервер ЮТ
     * @param UriInterface $uri
     * @param array $params
     * @param array $options
     * @return array
     */
    public function get(UriInterface $uri, array $params = [], array $options = []): array;

    /**
     * Сформировать и отправить POST запрос на сервер ЮТ
     * @param UriInterface $uri
     * @param array $params
     * @param array $options
     * @return array
     */
    public function post(UriInterface $uri, array $params = [], array $options = []): array;

    /**
     * Сформировать и отправить PUT запрос на сервер ЮТ
     * @param UriInterface $uri
     * @param array $params
     * @param array $options
     * @return array
     */
    public function put(UriInterface $uri, array $params = [], array $options = []): array;

    /**
     * Сформировать и отправить DELETE запрос на сервер ЮТ
     * @param UriInterface $uri
     * @param array $params
     * @param array $options
     * @return array
     */
    public function delete(UriInterface $uri, array $params = [], array $options = []): array;

}