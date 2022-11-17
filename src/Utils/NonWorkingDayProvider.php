<?php

namespace App\Utils;

class NonWorkingDayProvider
{
    public function provide(?int $year): array
    {
        if (!$year) {
            $year = 2022;
        }

        $easterDay = new \DateTimeImmutable(easter_date($year));

        return [
            $easterDay,
            $easterDay->modify('+10 days'),
            $easterDay->modify('+50 days'),
            new \DateTimeImmutable($year.'-08-15'),
            new \DateTimeImmutable($year.'-11-01'),
            new \DateTimeImmutable($year.'-11-11'),
        ];
    }
}
