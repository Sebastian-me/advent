<?php declare(strict_types=1);

namespace Advent\Day1;

/**
 * Day 1 Part 1
 */
class Heckschmeck
{
    private int $previousDepth = -1;

    public function schmeck(array $depthList): int
    {
        $amount = -1;
        foreach ($depthList as $depth) {
            if ($this->isGraterThanPrevious((int) $depth)) {
                $amount++;
            }
            $this->previousDepth = (int) $depth;
        }

        return $amount;
    }

    private function isGraterThanPrevious(int $depths): bool
    {
        return $depths > $this->previousDepth;
    }
}