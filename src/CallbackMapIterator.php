<?php

declare(strict_types=1);

namespace Horat1us\Util;

use Traversable;

/**
 * Maps values before yielding using callback
 *
 * @author Alexander Letnikow
 * @license BSD-3
 * @link https://github.com/Horat1us/map-iterator
 */
class CallbackMapIterator extends MapIterator
{
    protected \Closure $callback;

    /**
     * @param callable $callback Callback used for iterating
     */
    public function __construct(Traversable $iterator, callable $callback)
    {
        parent::__construct($iterator);
        $this->callback = \Closure::fromCallable($callback);
    }

    public function map($item)
    {
        return call_user_func($this->callback, $item);
    }
}
