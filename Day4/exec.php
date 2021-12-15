<?php declare(strict_types=1);

use Advent\Day4\Bingo1;
use Advent\Day4\Bingo2;

require 'Bingo1.php';
require 'Bingo2.php';

//$bing = new Bingo1();
$bing = new Bingo2();

$input = file_get_contents(__DIR__ . '/input.txt');
//$input = file_get_contents(__DIR__ . '/input.test.txt');
echo $bing->play($input);
//21070