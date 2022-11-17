<?php

namespace App\Utils;

class Calendar
{
    public function daysBetween(\DateTimeImmutable $d1, \DateTimeImmutable $d2): int
    {
        return $d1->diff($d2)->days + 1;
    }
}
