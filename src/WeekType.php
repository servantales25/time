<?php

namespace LuKun\Time;

use InvalidArgumentException;

class WeekType
{
    /** @var int */
    private $value;

    private function __construct(int $value)
    {
        if ($value < 1 && $value > 2) {
            throw new InvalidArgumentException('Unknown week type.');
        }

        $this->value = $value;
    }

    public function equalsTo(WeekType $weekType): bool
    {
        return $this->value === $weekType->value;
    }

    public static function getOdd(): WeekType
    {
        return new WeekType(1);
    }

    public static function getEven(): WeekType
    {
        return new WeekType(2);
    }
}