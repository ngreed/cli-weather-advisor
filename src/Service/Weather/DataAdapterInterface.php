<?php

namespace App\Service\Weather;

interface DataAdapterInterface
{
    const KEY_DATE_TIME = 'dateTime';
    const KEY_TEMPERATURE = 'temperature';
    const KEY_WIND_SPEED = 'windSpeed';

    /**
     * @param array $data
     *
     * @return array
     */
    public function transform(array $data): array;
}