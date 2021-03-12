<?php

namespace App\Tests\Service\Weather\Validator;

use App\Service\Weather\Validator\ShortsValidator;

class ShortsValidatorTest extends ValidatorTestHelper
{
    /**
     * @dataProvider isValidDataProvider
     *
     * @param array $data
     * @param bool $expectedValue
     */
    public function testIsValid(
        array $data,
        bool $expectedValue
    ): void {
        $validator = new ShortsValidator();

        $this->assertEquals(
            $expectedValue,
            $validator->isValid($this->prepareData($data))
        );
    }

    /**
     * @return array
     */
    public function isValidDataProvider(): array
    {
        return [
            [
                [
                    [21, 9],
                    [21, 6],
                    [23, 8],
                ],
                true
            ],
            [
                [
                    [21, 9],
                    [21, 6],
                    [23, 10],
                ],
                false
            ],
            [
                [
                    [21, 9],
                    [19, 6],
                    [23, 8],
                ],
                false
            ],
        ];
    }
}