<?php declare(strict_types=1);

namespace Advent\Day2;

class d2
{
    private const UP = 'up';
    private const DOWN = 'down';
    private const FORWARD = 'forward';
    private array $MAP = [
        self::UP => 0,
        self::DOWN => 0,
        self::FORWARD => 0
    ];

    public function move(string $input)
    {
        foreach (explode(PHP_EOL, $input) as $item) {
            [$direction, $height] = explode(' ', $item);

            $direction === self::UP ? $this->MAP[$direction] -= $height : $this->MAP[$direction] += $height;
        }

        return ($this->MAP[self::DOWN] + $this->MAP[self::UP]) * $this->MAP[self::FORWARD];
    }
}