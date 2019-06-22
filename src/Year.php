<?php

namespace LuKun\Time;

use InvalidArgumentException;

class Year
{
    /** @var int */
    private $value;

    public function __construct(int $value)
    {
        if ($value < 0) {
            throw new InvalidArgumentException('Year value must be positive number.');
        }

        $this->value = $value;
    }

    public function isLeap(): bool
    {
        return $this->value % 4 === 0
            && ($this->value % 100 !== 0 || $this->value % 400 === 0);
    }

    public function compareTo(Year $year): int
    {
        return $this->value <=> $year->value;
    }

    public function equalsTo(Year $year): bool
    {
        return $this->value === $year->value;
    }

    public function toInt(): int
    {
        return $this->value;
    }
}
