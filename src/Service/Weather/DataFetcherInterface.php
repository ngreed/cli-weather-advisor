<?php

namespace App\Service\Weather;

interface DataFetcherInterface
{
    /**
     * @param string $city
     *
     * @return mixed
     */
    public function getData(string $city): mixed;
}
