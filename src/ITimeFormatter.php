<?php

namespace LuKun\Time;

interface ITimeFormatter
{
    function formatTimeToString(Time $date): string;
    function parseStringToTime(string $value): Time;
}