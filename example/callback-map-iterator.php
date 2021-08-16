<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Horat1us\Util\CallbackMapIterator;

$numbers = [1,2,3];
$powCallback = static fn(int $number) => pow($number, $number);
$iterator = new CallbackMapIterator(new \ArrayIterator($numbers), $powCallback);

print_r(iterator_to_array($iterator)); // Array ( [0] => 1, [1] => 4, [2] => 27 )
