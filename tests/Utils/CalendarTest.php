<?php

namespace App\Tests\Utils;

use App\Utils\Calendar;
use PHPUnit\Framework\TestCase;

class CalendarTest extends TestCase
{
    public function testDaysBetween()
    {
        $d1 = new \DateTimeImmutable('2022-11-14');
        $d2 = new \DateTimeImmutable('2022-11-18');

        $calendar = new Calendar();

        $this->assertEquals(5, $calendar->daysBetween($d1, $d2), 'There should be 5 days between 2022-11-14 and 2022-11-18');
    }
}
