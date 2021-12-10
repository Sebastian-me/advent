<?php declare(strict_types=1);

namespace Advent\Day3;

class Day3_1
{
    private string $gamma = '';
    private string $epsilon = '';

    public function calc(string $input)
    {
        $binNumber = explode(PHP_EOL, $input);
        $resultList = $this->buildResultList($binNumber, $this->initResultList($binNumber));

        $avg = (count($binNumber) / 2);
        foreach ($resultList as $result) {
            $this->gamma .= (int)($result > $avg);
            $this->epsilon .= (int)($result < $avg);
        }

        //741950
        return bindec($this->gamma) * bindec($this->epsilon);
    }

    private function initResultList(array $explode): array
    {
        return array_fill(0, count(str_split($explode[0])), 0);
    }

    private function buildResultList(array $lines, array $resultList): array
    {
        foreach ($lines as $line) {
            foreach (str_split($line) as $key => $value) {
                $resultList[$key] += $value;
            }
        }

        return $resultList;
    }
}