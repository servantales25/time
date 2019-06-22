<?php

namespace LuKun\Time;

interface IDateFormatter
{
    function formatDateToString(Date $date): string;
    function parseStringToDate(string $value): Date;
}