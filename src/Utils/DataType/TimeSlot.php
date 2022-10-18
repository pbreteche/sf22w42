<?php

namespace App\Utils\DataType;

class TimeSlot
{
    private \DateTimeImmutable $date;
    private \DateTimeImmutable $from;
    private \DateTimeImmutable $to;

    public function __construct()
    {
        $this->date = new \DateTimeImmutable('now');
        $this->from = $this->date->modify('next hour');
        $this->to = $this->from->modify('next hour');
    }

    public function setDate(\DateTimeImmutable $date): TimeSlot
    {
        $this->date = $date;

        return $this;
    }

    public function setFrom(\DateTimeImmutable $from): self
    {
        $this->from = $from;

        return $this;
    }

    public function setTo(\DateTimeImmutable $to): self
    {
        $this->to = $to;

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