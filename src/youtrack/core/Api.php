<?php

namespace youtrack\core;

use \GuzzleHttp\Client as HttpClient;
use Cog\Contracts\YouTrack\Rest\Client\Client;
use Cog\YouTrack\Rest\Authorizer\TokenAuthorizer;
use Cog\YouTrack\Rest\HttpClient\GuzzleHttpClient;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\UriInterface;

class Api implements ApiInterface
{

    static protected $instance;
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Настроить клиент api YouTrack
     * @param string $url
     * @param string $token
     */
    static public function setup(string $url, string $token)
    {
        self::$instance = new static(
            new YouTrackClient(
                new GuzzleHttpClient(
                    new HttpClient(['base_uri' => $url,])
                ),
                new TokenAuthorizer($token)
            )
        );
    }

    /**
     * Получить клиент api YouTrack
     * @return ApiInterface
     * @throws Exception
     */
    static public function getInstance(): ApiInterface
    {
        if (empty(self::$instance)){
            throw new Exception('Api клиент не сконфигурирован');
        }
        return self::$instance;
    }

    /**
     * @inheritdoc
     */
    public function createUri(string $path): UriInterface
    {
        return new Uri($path);
    }

    /**
     * @inheritdoc
     */
    public function get(UriInterface $uri, array $params = [], array $options = []): array
    {
        return $this->client->get((string)$uri, $params, $options)->toArray();
    }

    /**
     * @inheritdoc
     */
    public function post(UriInterface $uri, array $params = [], array $options = []): array
    {
        return $this->client->post((string)$uri, $params, $options)->toArray();
    }

    /**
     * @inheritdoc
     */
    public function put(UriInterface $uri, array $params = [], array $options = []): array
    {
        return $this->client->put((string)$uri, $params, $options)->toArray();
    }

    /**
     * @inheritdoc
     */
    public function delete(UriInterface $uri, array $params = [], array $options = []): array
    {
        return $this->client->delete((string)$uri, $params, $options)->toArray();
    }

}