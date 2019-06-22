<?php

namespace LuKun\Time;

use DateTimeImmutable;

interface IClock
{
    function takeSnapshot(): DateTimeImmutable;
}