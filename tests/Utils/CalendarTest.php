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
        $fh = fopen(__DIR__.'/CalendarData.csv', 'r');
        while ($line = fgetcsv($fh)) {
            yield array_shift($line) => $line;
        }
        fclose($fh);
    }
}
