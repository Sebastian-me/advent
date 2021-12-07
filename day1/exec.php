<?php declare(strict_types=1);

use Advent\Day1\HeckSchmeck;
use Advent\Day1\HeckSchmeckP2;

require 'Heckschmeck.php';
require 'HeckSchmeckP2.php';

//$heck = new Heckschmeck();
//
//$file_get_contents = file_get_contents('./inputP1.txt');

$heck = new HeckschmeckP2();

$file_get_contents = file_get_contents('./inputP2.txt');

$list = explode(PHP_EOL, $file_get_contents);

echo $heck->schmeck($list);
//1645