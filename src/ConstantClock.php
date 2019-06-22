<?php

namespace LuKun\Time;

use DateTimeImmutable;

class ConstantClock implements IClock
{
    /** @var DateTimeImmutable */
    private $dateTime;

    public function __construct(DateTimeImmutable $dateTime)
    {
        $this->dateTime = $dateTime;
    }

    public function takeSnapshot(): DateTimeImmutable
    {
        return $this->dateTime;
    }
}