<?php

namespace App\Service\Weather;

use App\Service\Weather\Validator\JacketValidator;
use App\Service\Weather\Validator\PantsValidator;
use App\Service\Weather\Validator\ShortsValidator;

class ClothesValidator
{
    const CLOTHES_JACKET = 'jacket';
    const CLOTHES_PANTS = 'pants';
    const CLOTHES_SHORTS = 'shorts';

    private JacketValidator $jacketValidator;
    private PantsValidator $pantsValidator;
    private ShortsValidator $shortsValidator;
    private array $validatorMap;

    /**
     * @param JacketValidator $jacketValidator
     * @param PantsValidator $pantsValidator
     * @param ShortsValidator $shortsValidator
     */
    public function __construct(
        JacketValidator $jacketValidator,
        PantsValidator $pantsValidator,
        ShortsValidator $shortsValidator
    ) {
        $this->jacketValidator = $jacketValidator;
        $this->pantsValidator = $pantsValidator;
        $this->shortsValidator = $shortsValidator;

        $this->validatorMap = [
            self::CLOTHES_JACKET => $this->jacketValidator,
            self::CLOTHES_PANTS => $this->pantsValidator,
            self::CLOTHES_SHORTS => $this->shortsValidator
        ];
    }

    /**
     * @param array $data
     * @param string $clothes
     *
     * @return bool
     * @throws \Exception
     */
    public function isValid(array $data, string $clothes): bool
    {
        if (!array_key_exists($clothes, $this->validatorMap)) {
            throw new \Exception('Clothes of this type are not supported.');
        }

        return $this->validatorMap[$clothes]->isValid($data);
    }
}