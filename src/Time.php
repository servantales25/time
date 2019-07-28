<?php

namespace LuKun\Time;

use DateInterval;
use DateTimeImmutable;

class Time
{
    /** @var DateTimeImmutable */
    private $dateTime;

    public function __construct(Hour $hour, Minute $minute, Second $second, Microsecond $microsecond)
    {
        $this->dateTime = new DateTimeImmutable("1970-01-01 {$hour->toInt()}:{$minute->toInt()}:{$second->toInt()}.{$microsecond->toInt()}");
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

    public function add(DateInterval $dateInterval): Time
    {
        $dateTime = $this->dateTime->add($dateInterval);

        return self::fromDateTime($dateTime);
    }

    public function sub(DateInterval $dateInterval): Time
    {
        $dateTime = $this->dateTime->sub($dateInterval);

        return self::fromDateTime($dateTime);
    }

    public function compareTo(Time $time): int
    {
        return $this->dateTime <=> $time->dateTime;
    }

    public function equalsTo(Time $time): bool
    {
        return $this->dateTime == $time->dateTime;
    }

    public function toDateTime(?Date $date = null): DateTimeImmutable
    {
        $dateTime = $this->dateTime;
        if ($date !== null) {
            $year = $date->getYear()->toInt();
            $month = $date->getMonth()->toInt();
            $day = $date->getDay()->toInt();

            $dateTime = $dateTime->setDate($year, $month, $day);
        }

        return $dateTime;
    }

    public static function create(int $hour, int $minute, int $second, int $microsecond = 0): Time
    {
        return new Time(
            new Hour($hour),
            new Minute($minute),
            new Second($second),
            new Microsecond($microsecond)
        );
    }

    public static function fromDateTime(DateTimeImmutable $dateTime): Time
    {
        return self::create(
            $dateTime->format('H'),
            $dateTime->format('i'),
            $dateTime->format('s'),
            $dateTime->format('u')
        );
    }
}
