<?php

namespace LuKun\Time;

use InvalidArgumentException;

class Day
{
    /** @var int */
    private $value;

    public function __construct(int $value)
    {
        if ($value < 1 || $value > 31) {
            throw new InvalidArgumentException('Day value must be positive number between 1 and 31.');
        }

        $this->value = $value;
    }

    public function compareTo(Day $day): int
    {
        return $this->value <=> $day->value;
    }

    public function equalsTo(Day $day): bool
    {
        return $this->value === $day->value;
    }

    public function toInt(): int
    {
        return $this->value;
    }
}
