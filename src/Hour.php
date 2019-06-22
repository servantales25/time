<?php

namespace LuKun\Time;

use InvalidArgumentException;

class Hour
{
    /** @var int */
    private $value;

    public function __construct(int $value)
    {
        if ($value < 0 || $value > 23) {
            throw new InvalidArgumentException('Hour value must be positive number between 0 and 23.');
        }

        $this->value = $value;
    }

    public function compareTo(Hour $hour): int
    {
        return $this->value <=> $hour->value;
    }

    public function equalsTo(Hour $hour): bool
    {
        return $this->value === $hour->value;
    }

    public function toInt(): int
    {
        return $this->value;
    }
}
