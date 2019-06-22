<?php

namespace LuKun\Time;

use InvalidArgumentException;

class Microsecond
{
    /** @var int */
    private $value;

    public function __construct(int $value)
    {
        if ($value < 0 || $value > 999999) {
            throw new InvalidArgumentException('Microsecond value must be positive number between 0 and 999999.');
        }

        $this->value = $value;
    }

    public function compareTo(Microsecond $microsecond): int
    {
        return $this->value <=> $microsecond->value;
    }

    public function equalsTo(Microsecond $microsecond): bool
    {
        return $this->value === $microsecond->value;
    }

    public function toInt(): int
    {
        return $this->value;
    }
}
