<?php

namespace App\Service\Weather;

interface ClothesValidatorInterface
{
    /**
     * @param array $data
     *
     * @return bool
     */
    public function isValid(array $data): bool;
}
