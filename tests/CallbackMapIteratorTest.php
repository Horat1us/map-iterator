<?php

declare(strict_types=1);

namespace Horat1us\Util\Tests;

use Horat1us\Util\CallbackMapIterator;
use PHPUnit\Framework;

class CallbackMapIteratorTest extends Framework\TestCase
{
    /**
     * @dataProvider provideData
     */
    public function testTransform(array $data, callable $map, array $expectedData): void
    {
        $iterator = new CallbackMapIterator(new \ArrayIterator($data), $map);
        $result = iterator_to_array($iterator);
        $this->assertEquals($expectedData, $result);
    }

    public function provideData(): \Generator
    {
        yield [[1,2,3], fn(int $i) => $i + 1, [2,3,4]]; // test closure
        yield [[' hello ', '     world'], 'trim', ['hello', 'world']]; // test string callable
    }
}
