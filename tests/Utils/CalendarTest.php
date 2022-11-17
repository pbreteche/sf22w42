<?php

namespace App\Tests\Utils;

use App\Utils\Calendar;
use App\Utils\NonWorkingDayProvider;
use PHPUnit\Framework\TestCase;

class CalendarTest extends TestCase
{
    public function setUp(): void
    {
        $stub = $this->createStub(NonWorkingDayProvider::class);
        $stub->method('provide')
            ->willReturn([new \DateTimeImmutable('2022-11-11')]);

        $this->calendar = new Calendar($stub);
    }

    /**
     * @dataProvider providesDaysBetween
     */
    public function testDaysBetween($d1String, $d2String, $expected)
    {
        $d1 = new \DateTimeImmutable($d1String);
        $d2 = new \DateTimeImmutable($d2String);



        $this->assertEquals($expected, $this->calendar->daysBetween($d1, $d2),
            sprintf('There should be %d days between %s and %s', $expected, $d1String, $d2String)
        );
    }

    public function testWorkingDaysBetween()
    {
        $result = $this->calendar->workingDaysBetween(
            new \DateTimeImmutable('2022-11-07'),
            new \DateTimeImmutable('2022-11-11'),
        );

        $this->assertEquals(4, $result, 'There should be 4 working days this week');
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
