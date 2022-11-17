<?php

namespace App\Tests\Utils;

use App\Utils\Calendar;
use PHPUnit\Framework\TestCase;

class CalendarTest extends TestCase
{
    /**
     * @dataProvider providesDaysBetween
     */
    public function testDaysBetween($d1String, $d2String, $expected)
    {
        $d1 = new \DateTimeImmutable($d1String);
        $d2 = new \DateTimeImmutable($d2String);

        $calendar = new Calendar();

        $this->assertEquals($expected, $calendar->daysBetween($d1, $d2),
            sprintf('There should be %d days between %s and %s', $expected, $d1String, $d2String)
        );
    }

    public function providesDaysBetween(): iterable
    {
        yield 'standard usage' => ['2022-11-14', '2022-11-18', 5];
        yield 'symmetric' => ['2022-11-18', '2022-11-14', 5];
        yield 'same day usage' => ['2022-11-18', '2022-11-18', 1];
    }
}
