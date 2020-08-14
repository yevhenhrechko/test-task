<?php

namespace Tests\Unit;

use App\Http\Services\NameCompareService;
use PHPUnit\Framework\TestCase;

class NameTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param $fistName
     * @param $lastName
     * @param $expected
     */
    public function testNames($fistName, $lastName, $expected)
    {
        $result = (new NameCompareService($fistName, $lastName))->compare();

        $this->assertSame($expected, $result);
    }

    /**
     * @return array[]
     */
    public function dataProvider()
    {
        return [
            ['IDOWU', 'IDOWU', true],
            ['IDOWU EBUNOLUWA', 'EBUNOLUWA IDOWU', true],
            ['IDOWU EBUNOLUWA', 'IDOWU EBUNOLUWA', true],
            ['IDOWU SARAH EBUNOLUWA', 'EBUNOLUWA IDOWU', true],
            ['IDOWU EBUNOLUWA SARAH', 'SARAH, EBUNOLUWA IDOWU', true],
            ['IDOWU EBUNOLUWA SARAH', 'SARAH, ONOME EBUNOLUWA IDOWU', true],
            ['EBUNOLUWA SARAH', 'SARAH, ONOME EBUNOLUWA IDOWU', false],
        ];
    }
}
