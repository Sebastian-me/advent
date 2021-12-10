<?php declare(strict_types=1);

use Advent\Day3\Day3_1;

require 'Day3_1.php';

$d3 = new Day3_1();
$input = file_get_contents(__DIR__ . '/input.txt');

echo $d3->calc($input);