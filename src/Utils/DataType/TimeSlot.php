<?php

namespace App\Utils\DataType;

class TimeSlot
{
    private \DateTimeImmutable $date;
    private \DateTimeImmutable $from;
    private \DateTimeImmutable $to;

    public function __construct(\DateTimeImmutable $date, \DateTimeImmutable $from, \DateTimeImmutable $to)
    {
        $this->date = $date;
        $this->from = $from;
        $this->to = $to;
    }

    public function getDate(): \DateTimeImmutable
    {
        return $this->date;
    }

    public function getFrom(): \DateTimeImmutable
    {
        return $this->from;
    }

    public function getTo(): \DateTimeImmutable
    {
        return $this->to;
    }
}