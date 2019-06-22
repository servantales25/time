<?php

namespace LuKun\Time;

use DateTimeImmutable;
use DateTimeZone;
use Exception;

class RealtimeClock implements IClock
{
    /** @var DateTimeZone */
    private $timeZone;

    public function __construct(DateTimeZone $timeZone)
    {
        $this->timeZone = $timeZone;
    }

    /** @throws Exception */
    public function takeSnapshot(): DateTimeImmutable
    {
        return new DateTimeImmutable('now', $this->timeZone);
    }
}