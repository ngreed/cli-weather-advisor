<?php

namespace App\Service\Weather;

class WeatherPredictor
{
    private DataFetcherInterface $dataFetcher;
    private DataAdapterInterface $dataAdapter;

    /**
     * @param DataFetcherInterface $dataFetcher
     * @param DataAdapterInterface $dataAdapter
     */
    public function __construct(
        DataFetcherInterface $dataFetcher,
        DataAdapterInterface $dataAdapter
    ) {
        $this->dataFetcher = $dataFetcher;
        $this->dataAdapter = $dataAdapter;
    }

    /**
     * @param string $city
     *
     * @return array
     */
    public function getData(string $city): array
    {
        return $this->dataAdapter->transform($this->dataFetcher->getData($city));
    }
}