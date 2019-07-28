<?php

namespace LuKun\Time;

use DateInterval;
use DateTimeImmutable;
use RuntimeException;

class Date
{
    /** @var DateTimeImmutable */
    private $dateTime;

    public function __construct(Day $day, Month $month, Year $year)
    {
        $this->dateTime = new DateTimeImmutable("{$year->toInt()}-{$month->toInt()}-{$day->toInt()} 00:00:00.0");
    }

    public function getDay(): Day
    {
        return new Day($this->dateTime->format('d'));
    }

    public function getMonth(): Month
    {
        return new Month($this->dateTime->format('m'));
    }

    public function getYear(): Year
    {
        return new Year($this->dateTime->format('Y'));
    }

    public function getWeek(): Week
    {
        return new Week($this->dateTime->format('W'));
    }

    public function getWeekday(): Weekday
    {
        switch ($this->dateTime->format('N')) {
            case 1:
                return Weekday::getMonday();
            case 2:
                return Weekday::getTuesday();
            case 3:
                return Weekday::getWednesday();
            case 4:
                return Weekday::getThursday();
            case 5:
                return Weekday::getFriday();
            case 6:
                return Weekday::getSaturday();
            case 7:
                return Weekday::getSunday();

            default:
                throw new RuntimeException('Unexpected value associated to day of the week.');
        }
    }

    public function diff(Date $date): DateInterval
    {
        return $this->dateTime->diff($date->dateTime, true);
    }

    public function add(DateInterval $dateInterval): Date
    {
        $dateTime = $this->dateTime->add($dateInterval);

        return self::fromDateTime($dateTime);
    }

    public function sub(DateInterval $dateInterval): Date
    {
        $dateTime = $this->dateTime->sub($dateInterval);

        return self::fromDateTime($dateTime);
    }

    public function compareTo(Date $date): int
    {
        return $this->dateTime <=> $date->dateTime;
    }

    public function equalsTo(Date $date): bool
    {
        return $this->dateTime == $date->dateTime;
    }

    public function toDateTime(?Time $time = null): DateTimeImmutable
    {
        $dateTime = $this->dateTime;
        if ($time !== null) {
            $hour = $time->getHour()->toInt();
            $minute = $time->getMinute()->toInt();
            $second = $time->getSecond()->toInt();
            $microsecond = $time->getMicrosecond()->toInt();

            $dateTime = $dateTime->setTime($hour, $minute, $second, $microsecond);
        }

        return $dateTime;
    }

    public static function create(int $day, int $month, int $year): Date
    {
        return new Date(
            new Day($day),
            new Month($month),
            new Year($year)
        );
    }

    public static function fromDateTime(DateTimeImmutable $dateTime): Date
    {
        return self::create(
            $dateTime->format('d'),
            $dateTime->format('m'),
            $dateTime->format('Y')
        );
    }
}
