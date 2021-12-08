<?php declare(strict_types=1);

namespace Advent\Day2;

class d2p2
{
    private int $aim = 0;
    private int $forward = 0;
    private int $depth = 0;

    private const FORWARD = 'forward';
    private const DOWN = 'down';

    public function move(string $input): int
    {
        foreach (explode(PHP_EOL, $input) as $item) {

            [$direction, $height] = explode(' ', $item);

            if ($direction === self::FORWARD) {
                $this->forward += $height;
                $this->depth += $this->aim * $height;
            } else {
                $direction === self::DOWN ? $this->aim += $height : $this->aim -= $height;
            }
        }

        return $this->depth * $this->forward;
    }
}