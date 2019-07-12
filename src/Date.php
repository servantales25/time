<?php

namespace LuKun\Time;

use DateInterval;
use RuntimeException;
use DateTimeImmutable;

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

    public function compareTo(Date $date): int
    {
        return $this->dateTime <=> $date->dateTime;
    }

    public function equalsTo(Date $date): bool
    {
        return $this->dateTime == $date->dateTime;
    }

    public function toDateTime(): DateTimeImmutable
    {
        return $this->dateTime;
    }
}
