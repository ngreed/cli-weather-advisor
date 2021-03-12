<?php

namespace App\Service\Weather\Validator;

use App\Service\Weather\ClothesValidatorInterface;

class PantsValidator implements ClothesValidatorInterface
{
    private ShortsValidator $shortValidator;

    /**
     * @param ShortsValidator $shortsValidator
     */
    public function __construct(ShortsValidator $shortsValidator)
    {
        $this->shortValidator = $shortsValidator;
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    public function isValid(array $data): bool
    {
        return !$this->shortValidator->isValid($data);
    }
}