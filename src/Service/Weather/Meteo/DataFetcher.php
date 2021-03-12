<?php

namespace App\Service\Weather\Meteo;

use App\Service\Weather\DataFetcherInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class DataFetcher implements DataFetcherInterface
{
    const URL = "https://api.meteo.lt/v1/places/%s/forecasts/long-term";

    private HttpClientInterface $httpClient;

    /**
     * @param HttpClientInterface $httpClient
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param string $city
     *
     * @return array
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function getData(string $city): array
    {
        $url = sprintf(self::URL, $city);
        $response = $this->httpClient->request('GET', $url);

        return $response->toArray();
    }
}