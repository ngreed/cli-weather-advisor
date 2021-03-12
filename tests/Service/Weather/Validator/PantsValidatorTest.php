<?php

namespace App\Tests\Service\Weather\Validator;

use App\Service\Weather\Validator\PantsValidator;
use App\Service\Weather\Validator\ShortsValidator;
use PHPUnit\Framework\TestCase;

class PantsValidatorTest extends TestCase
{
    /**
     * @dataProvider isValidDataProvider
     *
     * @param bool $shortsValidatorReturnValue
     * @param bool $expectedValue
     */
    public function testIsValid(
        bool $shortsValidatorReturnValue,
        bool $expectedValue
    ): void {
        $shortsValidator = $this->createMock(ShortsValidator::class);
        $shortsValidator->method('isValid')->willReturn($shortsValidatorReturnValue);
        $pantsValidator = new PantsValidator($shortsValidator);

        $this->assertEquals(
            $expectedValue,
            $pantsValidator->isValid([])
        );
    }

    /**
     * @return array
     */
    public function isValidDataProvider(): array
    {
        return [
            [
                true,
                false
            ],
            [
                false,
                true
            ],
        ];
    }
}