<?php

namespace LuKun\Time;

use InvalidArgumentException;

class Second
{
    /** @var int */
    private $value;

    public function __construct(int $value)
    {
        if ($value < 0 || $value > 59) {
            throw new InvalidArgumentException('Second value must be positive number between 0 and 59.');
        }

        $this->value = $value;
    }

    public function compareTo(Second $second): int
    {
        return $this->value <=> $second->value;
    }

    public function equalsTo(Second $second): bool
    {
        return $this->value === $second->value;
    }

    public function toInt(): int
    {
        return $this->value;
    }
}
