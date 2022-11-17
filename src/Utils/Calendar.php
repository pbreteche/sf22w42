<?php

namespace App\Utils;

class Calendar
{
    private NonWorkingDayProvider $provider;

    public function __construct(NonWorkingDayProvider $provider)
    {
        $this->provider = $provider;
    }

    public function daysBetween(\DateTimeImmutable $d1, \DateTimeImmutable $d2): int
    {
        return $d1->diff($d2)->days + 1;
    }

    public function workingDaysBetween(\DateTimeImmutable $d1, \DateTimeImmutable $d2): int
    {
        return $d1->diff($d2)->days + 1;
    }
}
