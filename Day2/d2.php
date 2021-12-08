<?php declare(strict_types=1);

namespace Advent\Day2;

class d2
{
    private const UP = 'up';
    private const DOWN = 'down';
    private const FORWARD = 'forward';
    private array $map = [
        self::UP => 0,
        self::DOWN => 0,
        self::FORWARD => 0
    ];

    public function move(string $input): int
    {
        foreach (explode(PHP_EOL, $input) as $item) {
            [$direction, $height] = explode(' ', $item);

            $direction === self::UP ? $this->map[$direction] -= $height : $this->map[$direction] += $height;
        }

        return ($this->map[self::DOWN] + $this->map[self::UP]) * $this->map[self::FORWARD];
    }
}