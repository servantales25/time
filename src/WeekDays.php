<?php

namespace LuKun\Time;

class WeekDays
{
    /** @var array<int, Weekday> */
    private $weekdays;

    public function __construct()
    {
        $this->weekdays = [];
    }

    public function include(Weekday $weekday): bool
    {
        if (!$this->contains($weekday)) {
            $this->weekdays[$weekday->toInt()] = $weekday;

            return true;
        }

        return false;
    }

    public function exclude(Weekday $weekday): bool
    {
        if ($this->contains($weekday)) {
            unset($this->weekdays[$weekday->toInt()]);

            return true;
        }

        return false;
    }

    public function contains(Weekday $weekday): bool
    {
        return isset($this->weekdays[$weekday->toInt()]);
    }

    public function toArray(): array
    {
        $out = [];
        foreach($this->weekdays as $weekday) {
            $out[] = $weekday;
        }

        return $out;
    }
}
