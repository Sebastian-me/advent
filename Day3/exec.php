<?php declare(strict_types=1);

use Advent\Day3\Day3_1;
use Advent\Day3\Day3_2;


require 'Day3_1.php';
require 'Day3_2.php';

//$d3 = new Day3_1();
$d3 = new Day3_2();
$input = file_get_contents(__DIR__ . '/input.txt');

echo $d3->calc($input);