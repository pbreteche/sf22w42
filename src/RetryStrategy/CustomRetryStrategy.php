<?php

namespace App\RetryStrategy;

use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Retry\RetryStrategyInterface;

class CustomRetryStrategy implements RetryStrategyInterface
{
    private int $customParam;

    public function __construct(int $customParam=2)
    {
        $this->customParam = $customParam;
    }

    /**
     * @inheritDoc
     */
    public function isRetryable(Envelope $message, \Throwable $throwable = null): bool
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function getWaitingTime(Envelope $message, \Throwable $throwable = null): int
    {
        return 1000;
    }
}