<?php declare(strict_types=1);

use Advent\Day2\d2;
use Advent\Day2\d2p2;

require 'd2.php';
require 'd2p2.php';


//$d2 = new d2();

$d2 = new d2p2();
$input = file_get_contents(__DIR__ . '/input.txt');


echo $d2->move($input);