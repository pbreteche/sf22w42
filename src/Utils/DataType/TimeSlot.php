<?php

namespace App\Utils\DataType;

class TimeSlot
{
    private \DateTimeImmutable $date;
    private \DateTimeImmutable $from;
    private \DateTimeImmutable $to;

    public function __construct()
    {
        $this->date = new \DateTimeImmutable('today');
        $this->from = $this->date->modify('next hour');
        $this->to = $this->from->modify('next hour');
    }

    public function setFrom(int $hour, int $minutes = 0, int $seconds = 0): self
    {
        $this->from = $this->from->setTime($hour, $minutes, $seconds);

        return $this;
    }

    public function setTo(int $hour, int $minutes = 0, int $seconds = 0): self
    {
        $this->to = $this->to->setTime($hour, $minutes, $seconds);

        return $this;
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