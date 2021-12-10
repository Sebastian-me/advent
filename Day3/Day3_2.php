<?php declare(strict_types=1);

namespace Advent\Day3;

class Day3_2
{
    public function calc(string $input): int
    {
        $resultList = $this->buildResultList(explode(PHP_EOL, $input));

        return $this->determineOxygenRating($resultList) * $this->determineCo2Rating($resultList);
    }

    private function buildResultList(array $lines): array
    {
        $resultList = [];
        foreach ($lines as $key => $line) {
            foreach (str_split($line) as $value) {
                if (!array_key_exists($key, $resultList)) {
                    $resultList[$key] = [];
                }
                $resultList[$key][] = $value;
            }
        }

        return $resultList;
    }

    private function determineOxygenRating(array $binList): int
    {
        return $this->verifyLifeSupportRating($binList, '1', '0');
    }

    private function determineCo2Rating(array $binList): int
    {
        return $this->verifyLifeSupportRating($binList, '0', '1');
    }

    private function verifyLifeSupportRating(array $binList, string $valueA, string $valueB): int
    {
        $length = strlen(implode($binList[0]));
        for ($i = 0; $i < $length; $i++) {
            if (count($binList) === 1) {
                break;
            }

            array_sum(array_column($binList, $i)) >= (count($binList) / 2) ?
                $binList = $this->filterList($binList, $valueA, $i) :
                $binList = $this->filterList($binList, $valueB, $i);
        }

        return bindec(implode($binList[0]));
    }

    private function filterList(array $list, string $value, int $index): array
    {
        $result = [];
        foreach ($list as $entry) {
            if ($entry[$index] === $value) {
                $result[] = $entry;
            }
        }

        return $result;
    }
}