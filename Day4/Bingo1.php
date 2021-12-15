<?php declare(strict_types=1);

namespace Advent\Day4;

class Bingo1
{
    private array $pickedNumberList = [];

    public function play(string $input): int
    {
        $boardList = explode(PHP_EOL . PHP_EOL, $input);
        $numberList = array_shift($boardList);
        $boardList = $this->convertBoardList($boardList);

        foreach (explode(',', $numberList) as $number) {
            $this->pickedNumberList[] = $number;
            if (($result = $this->check($boardList, $number)) !== -1) {
                return $result;
            }
        }

        return -1;
    }

    private function check(array $boards, string $number): int
    {
        foreach ($boards as $board) {
            if ($this->checkRow($board) || $this->checkCol($board)) {
                return $this->calc($board, $number);
            }
        }

        return -1;
    }

    private function checkCol(array $board): bool
    {
        $result = false;
        for ($i = 0; $i < 5; $i++) {
            if ($this->isWinner(array_column($board, $i))) {
                $result = true;
                break;
            }
        }

        return $result;
    }

    private function checkRow(array $board): bool
    {
        $result = false;
        foreach ($board as $col) {
            if ($this->isWinner($col)) {
                $result = true;
                break;
            }
        }

        return $result;
    }

    private function isWinner(array $list): bool
    {
        $won = true;
        foreach ($list as $number) {
            if (!in_array($number, $this->pickedNumberList, true)) {
                $won = false;
                break;
            }
        }

        return $won;
    }

    private function convertBoardList(array $boards): array
    {
        $boardList = [];
        foreach ($boards as $board) {
            $boardTmp = [];
            foreach (explode(PHP_EOL, $board) as $row) {
                $boardTmp[] = $this->getNoneEmptyValues($row);
            }
            $boardList[] = $boardTmp;
        }

        return $boardList;
    }

    private function calc(array $board, $lastNumber): int
    {
        $amount = 0;
        foreach ($board as $row) {
            $amount += $this->sumNonePickedFields($row);
        }

        return $amount * $lastNumber;
    }

    private function getNoneEmptyValues(string $row): array
    {
        return array_values(
            array_filter(
                explode(' ', $row),
                static function ($item) {
                    return $item !== '';
                }
            )
        );
    }

    private function sumNonePickedFields($row)
    {
        return array_sum(
            array_filter($row, function ($item) {
                return !in_array($item, $this->pickedNumberList, true);
            })
        );
    }
}