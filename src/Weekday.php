<?php

namespace LuKun\Time;

use DateInterval;
use DateTimeImmutable;
use InvalidArgumentException;

class Weekday
{
    /** @var int */
    private $value;

    public function __construct(int $value)
    {
        if ($value < 1 || $value > 7) {
            throw new InvalidArgumentException('Weekday value must be positive number between 1 and 7.');
        }

        $this->value = $value;
    }

    public function isWeekendDay(): bool
    {
        return $this->value === 6 || $this->value === 7;
    }

    public function getNextClosestFrom(DateTimeImmutable $dateTime): DateTimeImmutable
    {
        do {
            $dateTime = $dateTime->add(new DateInterval('P1D'));
        } while ($dateTime->format('N') !== $this->value);

        return $dateTime;
    }

    public function getPreviousClosestFrom(DateTimeImmutable $dateTime): DateTimeImmutable
    {
        do {
            $dateTime = $dateTime->sub(new DateInterval('P1D'));
        } while ($dateTime->format('N') !== $this->value);

        return $dateTime;
    }

    public function toInt(): int
    {
        return $this->value;
    }

    public function equalsTo(Weekday $weekday): bool
    {
        return $this->value === $weekday->value;
    }

    public static function getMonday(): Weekday
    {
        return new Weekday(1);
    }

    public static function getTuesday(): Weekday
    {
        return new Weekday(2);
    }

    public static function getWednesday(): Weekday
    {
        return new Weekday(3);
    }

    public static function getThursday(): Weekday
    {
        return new Weekday(4);
    }

    public static function getFriday(): Weekday
    {
        return new Weekday(5);
    }

    public static function getSaturday(): Weekday
    {
        return new Weekday(6);
    }

    public static function getSunday(): Weekday
    {
        return new Weekday(7);
    }
}
