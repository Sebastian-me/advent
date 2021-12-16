<?php declare(strict_types=1);

namespace Advent\Day4;

class Bingo2
{
    private array $alreadyPickedNumbers = [];
    private array $numberList;

    public function play(string $input): int
    {
        $inputList = explode(PHP_EOL . PHP_EOL, $input);
        $this->numberList = explode(',', array_shift($inputList));
        $inputList = $this->convertBoardsToList($inputList);

        while (count($inputList) > 1) {
            if (($id = $this->findWinningBoard($inputList)) !== -1) {
                array_splice($inputList, $id, 1);
            }
        }

        return $this->calcRemainingBoard(...$inputList);
    }

    private function findWinningBoard(array $boards): int
    {
        $winningBoard = -1;
        foreach ($this->numberList as $number) {
            $this->alreadyPickedNumbers[] = $number;
            if (($boardKey = $this->winningBoardExists($boards)) !== -1) {
                $winningBoard = $boardKey;
                break;
            }

            $this->numberList = array_diff($this->numberList, $this->alreadyPickedNumbers);
        }

        return $winningBoard;
    }

    private function winningBoardExists(array $boards): int
    {
        $winnerId = -1;
        foreach ($boards as $key => $board) {
            if (($winnerId = $this->getWinnerId($board, $key, $winnerId)) !== -1) {
                break;
            }
        }

        return $winnerId;
    }


    private function hasWinCon(array $row): bool
    {
        return array_diff($row, $this->alreadyPickedNumbers) === [];
    }

    private function calcRemainingBoard(array $board): int
    {
        $amount = 0;
        $lastPickedNumber = array_values($this->numberList)[1];
        $this->alreadyPickedNumbers[] = $lastPickedNumber;

        foreach ($board as $row) {
            $amount += array_sum(array_diff($row, $this->alreadyPickedNumbers));
        }

        return $amount * (int)$lastPickedNumber;
    }

    private function getWinnerId(array $convertedBoard, $key, $winnerId): int
    {
        for ($i = 0; $i < 5; $i++) {
            if ($this->hasWinCon(array_column($convertedBoard, $i)) || $this->hasWinCon($convertedBoard[$i])) {
                $winnerId = $key;
                break;
            }
        }
        return $winnerId;
    }

    private function convertBoardsToList(array $boards): array
    {
        $convertedBoards = [];
        foreach ($boards as $board) {
            $convertedBoards[] = $this->convertBoard($board);
        }

        return $convertedBoards;
    }

    private function convertBoard(string $board): array
    {
        $result = [];
        foreach (explode(PHP_EOL, $board) as $row) {
            $result[] = array_values(
                array_filter(
                    explode(' ', $row),
                    static function ($item) {
                        return $item !== '';
                    }
                )
            );
        }

        return $result;
    }
}