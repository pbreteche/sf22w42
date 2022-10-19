<?php

namespace App\Message;

class CustomMessage
{
    public function __construct(private readonly string $subject)
    {
    }

    public function getSubject(): string
    {
        return $this->subject;
    }
}
