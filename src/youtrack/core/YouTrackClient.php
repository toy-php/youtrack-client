<?php

namespace youtrack\core;

use Cog\YouTrack\Rest\Client\YouTrackClient as BaseYouTrackClient;

class YouTrackClient extends BaseYouTrackClient
{

    protected $endpointPrefix = '/api';

    /**
     * @inheritdoc
     */
    protected function buildUri(string $uri): string
    {
        return $this->endpointPrefix . '/' . ltrim($uri, '/');
    }
}