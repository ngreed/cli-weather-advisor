<?php

namespace App\Tests\Service\Weather\Validator;

use App\Service\Weather\Validator\JacketValidator;

class JacketValidatorTest extends ValidatorTestHelper
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
        $validator = new JacketValidator();

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
                    [15, 6],
                    [11, 9],
                    [17, 10],
                    [16, 8],
                    [5, 10],
                    [14, 4],
                ],
                true
            ],
            [
                [
                    [10, 12],
                    [3, 15],
                    [15, 18],
                    [13, 11],
                    [9, 14],
                    [17, 12],
                ],
                true
            ],
            [
                [
                    [23, 11],
                    [23, 11],
                    [23, 11],
                    [23, 11],
                    [23, 11],
                    [23, 11],
                ],
                true
            ],
            [
                [
                    [23, 9],
                    [20, 6],
                    [21, 4],
                    [25, 6],
                    [22, 2],
                    [24, 8],
                ],
                false
            ],
            [
                [
                    [26, 5],
                    [28, 8],
                    [26, 11],
                    [31, 14],
                    [30, 3],
                    [28, 6],
                ],
                false
            ],
        ];
    }
}