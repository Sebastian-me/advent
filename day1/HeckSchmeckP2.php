<?php declare(strict_types=1);

namespace Advent\Day1;

/**
 * Day 1 Part 2
 */
class HeckSchmeckP2
{
    public function schmeck(array $depths): int
    {
        $amount = 0;
        $startIndex = 0;
        while (array_key_exists($startIndex + 3, $depths)) {
            if ($this->chunk($depths, $startIndex) < $this->chunk($depths, $startIndex + 1)) {
                $amount++;
            }
            $startIndex++;
        }

        return $amount;
    }


    private function chunk(array $depths, int $index): int
    {
        return $depths[$index] + $depths[$index + 1] + $depths[$index + 2];
    }
}