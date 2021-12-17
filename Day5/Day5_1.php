<?php declare(strict_types=1);

namespace Advent\Day5;

class Day5_1
{
    private array $ocean = [];

    public function __construct()
    {
        $this->initOcean();
    }

    public function countDangerousPlaces(string $input): int
    {
        foreach (explode(PHP_EOL, $input) as $ventCoordinates) {
            [$start, $end] = explode(' -> ', $ventCoordinates);
            [$x1, $y1] = $this->getCoordinates($start);
            [$x2, $y2] = $this->getCoordinates($end);

            if ($x1 === $x2 || $y1 === $y2) {
                $this->placeVents(range($y1, $y2), range($x1, $x2));
            }
        }

        return $this->calcOverlapping();
    }

    private function initOcean(): void
    {
        $value = array_fill(0, 999, 0);
        $this->ocean = array_fill(0, 999, $value);
    }

    private function calcOverlapping(): int
    {
        $amount = 0;
        foreach ($this->ocean as $row) {
            foreach ($row as $number) {
                if ($number > 1) {
                    $amount++;
                }
            }
        }

        return $amount;
    }

    private function getCoordinates(string $input): array
    {
        return explode(',', $input);
    }

    private function placeVents(array $rangeY, array $rangeX): void
    {
        $this->hasSameLength($rangeY, $rangeX) ? $this->setDiagonalVent($rangeY, $rangeX) : $this->setDefaultVent($rangeY, $rangeX);
    }

    private function hasSameLength(array $rangeY, array $rangeX): bool
    {
        return count($rangeY) === count($rangeX);
    }

    private function setDiagonalVent(array $rangeY, array $rangeX): void
    {
        foreach ($rangeY as $key => $y) {
            $this->ocean[$y][$rangeX[$key]]++;
        }
    }

    private function setDefaultVent(array $yList, array $xList): void
    {
        $isXNoneIterable = count($xList) === 1;
        if ($isXNoneIterable) {
            $iterable = $yList;
            $noneIterable = $xList[0];
        } else {
            $iterable = $xList;
            $noneIterable = $yList[0];
        }

        foreach ($iterable as $coordinate) {
            $isXNoneIterable ? $this->ocean[$coordinate][$noneIterable]++ : $this->ocean[$noneIterable][$coordinate]++;
        }
    }
}