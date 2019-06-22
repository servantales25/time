<?php

namespace LuKun\Time;

use InvalidArgumentException;

class Month
{
    /** @var int */
    private $value;

    public function __construct(int $value)
    {
        if ($value < 1 || $value > 12) {
            throw new InvalidArgumentException('Month value must be positive number between 1 and 12.');
        }

        $this->value = $value;
    }

    public function compareTo(Month $month): int
    {
        return $this->value <=> $month->value;
    }

    public function equalsTo(Month $month): bool
    {
        return $this->value === $month->value;
    }

    public function toInt(): int
    {
        return $this->value;
    }
}
