<?php

namespace App\Service\Weather\Meteo;

use App\Service\Weather\DataAdapterInterface;

class DataAdapter implements DataAdapterInterface
{
    const KEY_SOURCE_DATA = 'forecastTimestamps';
    const KEY_SOURCE_DATETIME = 'forecastTimeUtc';
    const KEY_SOURCE_TEMPERATURE = 'airTemperature';
    const KEY_SOURCE_WIND_SPEED = 'windSpeed';

    /**
     * @param array $data
     *
     * @return array
     * @throws \Exception
     */
    public function transform(array $data): array
    {
        if (!array_key_exists(self::KEY_SOURCE_DATA, $data)) {
            throw new \Exception('Bad data.');
        }

        $transformedData = [];
        foreach ($data[self::KEY_SOURCE_DATA] as $hourData) {
            if (empty($hourData)
                || !(array_key_exists(self::KEY_SOURCE_DATETIME, $hourData)
                    && array_key_exists(self::KEY_SOURCE_TEMPERATURE, $hourData)
                    && array_key_exists(self::KEY_SOURCE_WIND_SPEED, $hourData))
            ) {
                throw new \Exception('Bad data.');
            }

            $transformedData[] = [
                self::KEY_DATE_TIME => $hourData[self::KEY_SOURCE_DATETIME],
                self::KEY_TEMPERATURE => $hourData[self::KEY_SOURCE_TEMPERATURE],
                self::KEY_WIND_SPEED => $hourData[self::KEY_SOURCE_WIND_SPEED]
            ];
        }

        return $transformedData;
    }
}
