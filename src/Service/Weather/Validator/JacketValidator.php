<?php

namespace App\Service\Weather\Validator;

use App\Service\Weather\ClothesValidatorInterface;
use App\Service\Weather\DataAdapterInterface;

class JacketValidator implements ClothesValidatorInterface
{
    const DURATION_HOURS = 6;
    const THRESHOLD_TEMPERATURE_LOW = 18;
    const THRESHOLD_TEMPERATURE_HIGH = 25;
    const THRESHOLD_WIND_SPEED = 10;

    /**
     * @param array $data
     *
     * @return bool
     */
    public function isValid(array $data): bool
    {
        for ($i = 0; $i < self::DURATION_HOURS; $i++) {
            if (($data[$i][DataAdapterInterface::KEY_TEMPERATURE] >= self::THRESHOLD_TEMPERATURE_LOW)
                && ($data[$i][DataAdapterInterface::KEY_TEMPERATURE] <= self::THRESHOLD_TEMPERATURE_HIGH)
                && ($data[$i][DataAdapterInterface::KEY_WIND_SPEED] <= self::THRESHOLD_WIND_SPEED)
            ) {
                return false;
            } elseif ($data[$i][DataAdapterInterface::KEY_TEMPERATURE] > self::THRESHOLD_TEMPERATURE_HIGH) {
                return false;
            }
        }

        return true;
    }
}