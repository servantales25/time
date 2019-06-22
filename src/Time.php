<?php

namespace LuKun\Time;

use DateInterval;
use DateTimeImmutable;

class Time
{
    /** @var DateTimeImmutable */
    private $dateTime;

    public function __construct(DateTimeImmutable $dateTime)
    {
        $this->dateTime = $dateTime->setDate(1970, 1, 1);
    }

    public function getHour(): Hour
    {
        return new Hour($this->dateTime->format('H'));
    }

    public function getMinute(): Minute
    {
        return new Minute($this->dateTime->format('i'));
    }

    public function getSecond(): Second
    {
        return new Second($this->dateTime->format('s'));
    }

    public function getMicrosecond(): Microsecond
    {
        return new Microsecond($this->dateTime->format('u'));
    }

    public function diff(Time $time): DateInterval
    {
        return $this->dateTime->diff($time->dateTime, true);
    }

    public function compareTo(Time $time): int
    {
        return $this->dateTime <=> $time->dateTime;
    }

    public function equalsTo(Time $time): bool
    {
        return $this->dateTime == $time->dateTime;
    }

    public function toDateTime(Date $date): DateTimeImmutable
    {
        return $this->dateTime->setDate(
            $date->getYear()->toInt(),
            $date->getMonth()->toInt(),
            $date->getDay()->toInt()
        );
    }
}
