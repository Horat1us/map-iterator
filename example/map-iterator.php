<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Horat1us\Util\MapIterator;

class IntegerPlusOneInterator extends MapIterator
{
    public function map($item)
    {
        if (!is_int($item)) {
            throw new \InvalidArgumentException("Unable map not-integer item.");
        }
        return $item + 1;
    }
}

$numbers = [1,2,3];
$iterator = new IntegerPlusOneInterator(new \ArrayIterator($numbers));
print_r(iterator_to_array($iterator)); // Array ( [0] => 2, [1] => 3, [2] => 4 )
