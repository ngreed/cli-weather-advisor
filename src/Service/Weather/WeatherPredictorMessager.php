<?php

namespace App\Service\Weather;

class WeatherPredictorMessager
{
    const DURATION_HOURS = 3;
    const TEMPLATE_MSG_PREDICTION_COMPLETE = "Weather data:\r\n\r\n%s";
    const TEMPLATE_MSG_PREDICTION_DATA = "Time: %s\r\nTemperature: %s\r\nWind Speed: %s\r\n\r\n";
    const MSG_CLOTHES_VALID = 'Great choice!';
    const MSG_CLOTHES_NOT_VALID = 'Not a very good idea.';

    /**
     * @param array $data
     *
     * @return string
     */
    public function getPredictionMessage(array $data): string
    {
        $msg = '';

        for ($i = 0; $i < self::DURATION_HOURS; $i++) {
            $hourData = $data[$i];
            $msg .= sprintf(
                self::TEMPLATE_MSG_PREDICTION_DATA,
                $hourData[DataAdapterInterface::KEY_DATE_TIME],
                $hourData[DataAdapterInterface::KEY_TEMPERATURE],
                $hourData[DataAdapterInterface::KEY_WIND_SPEED]
            );
        }

        return sprintf(self::TEMPLATE_MSG_PREDICTION_COMPLETE, $msg);
    }

    /**
     * @param bool $isValid
     *
     * @return string
     */
    public function getClothesValidationMessage(bool $isValid): string
    {
        return $isValid
            ? self::MSG_CLOTHES_VALID
            : self::MSG_CLOTHES_NOT_VALID;
    }
}