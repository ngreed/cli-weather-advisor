<?php

namespace App\Tests\Service\Weather\Validator;

use App\Service\Weather\DataAdapterInterface;
use PHPUnit\Framework\TestCase;

class ValidatorTestHelper extends TestCase
{
    /**
     * @param array $data
     *
     * @return array
     */
    protected function prepareData(array $data): array
    {
        $preparedData = [];
        foreach ($data as $hourData) {
            $preparedData[] = [
                DataAdapterInterface::KEY_DATE_TIME => '',
                DataAdapterInterface::KEY_TEMPERATURE => $hourData[0],
                DataAdapterInterface::KEY_WIND_SPEED => $hourData[1]
            ];
        }

        return $preparedData;
    }
}