<?php

namespace LuKun\Time;

use InvalidArgumentException;

class Week
{
    /** @var int */
    private $value;

    public function __construct(int $value)
    {
        if ($value < 1 || $value > 53) {
            throw new InvalidArgumentException('Week value must be positive number between 1 and 53.');
        }

        $this->value = $value;
    }

    public function getType(): WeekType
    {
        return ($this->value % 2 === 0) ? WeekType::getEven() : WeekType::getOdd();
    }

    public function toInt(): int
    {
        return $this->value;
    }
}
