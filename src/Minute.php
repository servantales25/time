<?php

namespace LuKun\Time;

use InvalidArgumentException;

class Minute
{
    /** @var int */
    private $value;

    public function __construct(int $value)
    {
        if ($value < 0 || $value > 59) {
            throw new InvalidArgumentException('Minute value must be positive number between 0 and 59.');
        }

        $this->value = $value;
    }

    public function compareTo(Minute $minute): int
    {
        return $this->value <=> $minute->value;
    }

    public function equalsTo(Minute $minute): bool
    {
        return $this->value === $minute->value;
    }

    public function toInt(): int
    {
        return $this->value;
    }
}
