<?php

namespace LuKun\Time;

use DateTimeImmutable;

class Clock
{
    /** @var DateTimeImmutable|null */
    private static $fixedValue = null;

    public static function set(DateTimeImmutable $dateTime): bool
    {
        if (self::$fixedValue != $dateTime) {
            self::$fixedValue = $dateTime;

            return true;
        }

        return false;
    }

    public static function stop(): DateTimeImmutable
    {
        $dateTime = self::toDateTime();

        self::$fixedValue = $dateTime;

        return $dateTime;
    }

    public static function run(): DateTimeImmutable
    {
        self::$fixedValue = null;

        return self::toDateTime();
    }

    public static function toDateTime(): DateTimeImmutable
    {
        return self::$fixedValue ?? new DateTimeImmutable();
    }
}
