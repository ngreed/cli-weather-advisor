<?php

namespace App\Service\Weather\Validator;

use App\Service\Weather\ClothesValidatorInterface;
use App\Service\Weather\DataAdapterInterface;

class ShortsValidator implements ClothesValidatorInterface
{
    const DURATION_HOURS = 3;
    const THRESHOLD_TEMPERATURE = 20;
    const THRESHOLD_WIND_SPEED = 10;

    /**
     * @param array $data
     *
     * @return bool
     */
    public function isValid(array $data): bool
    {
        for ($i = 0; $i < self::DURATION_HOURS; $i++) {
            if (($data[$i][DataAdapterInterface::KEY_TEMPERATURE] <= self::THRESHOLD_TEMPERATURE)
                || ($data[$i][DataAdapterInterface::KEY_WIND_SPEED] >= self::THRESHOLD_WIND_SPEED)
            ) {
                return false;
            }
        }

        return true;
    }
}