<?php declare(strict_types=1);

use Advent\Day5\Day5_1;
use Advent\Day5\Day5_2;

require 'Day5_1.php';
require 'Day5_2.php';

$d5 = new Day5_1();
//$d5 = new Day5_2();

//$input = file_get_contents(__DIR__ . '/input.test.txt');
$input = file_get_contents(__DIR__ . '/input.txt');
echo $d5->countDangerousPlaces($input);