<?php

declare(strict_types=1);

namespace Horat1us\Util;

/**
 * Maps values before yielding
 *
 * @author Alexander Letnikow
 * @license BSD-3
 * @link https://github.com/Horat1us/map-iterator
 *
 * @template O
 * @template I
 */
abstract class MapIterator extends \IteratorIterator
{
    /**
     * Method used for transform current item
     *
     * @param I $item
     * @return O mixed
     */
    abstract public function map($item);

    /**
     * @return O
     */
    public function current()
    {
        return $this->map(parent::current());
    }
}
