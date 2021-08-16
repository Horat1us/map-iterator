# Map Iterator (PHP)
[![Latest Stable Version](https://poser.pugx.org/horat1us/map-iterator/version)](https://packagist.org/packages/horat1us/map-iterator)
[![Total Downloads](https://poser.pugx.org/horat1us/map-iterator/downloads)](https://packagist.org/packages/horat1us/map-iterator)
[![codecov](https://codecov.io/gh/Horat1us/map-iterator/branch/master/graph/badge.svg?token=MnQVUwASBj)](https://codecov.io/gh/Horat1us/map-iterator)
[![Test Package](https://github.com/Horat1us/map-iterator/actions/workflows/test.yml/badge.svg)](https://github.com/Horat1us/map-iterator/actions/workflows/test.yml)

[Русская документация](./README.RU.md)

Iterators to map inner iterator values before yielding.

Inspired by [\FilterIterator](https://www.php.net/manual/ru/class.filteriterator.php)
and [\CallbackFilterIterator](https://www.php.net/manual/ru/class.callbackfilteriterator.php).

## Installation
Using [composer](https://getcomposer.org/)
```bash
composer require horat1us/map-iterator:^1.0
```

## Usage
### MapIterator
Maps values before yielding using abstract method.

See [./example/map-iterator.php](./example/map-iterator.php)
```php
<?php

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

```
### CallbackMapIterator (recommended)
Maps values before yielding using
[callback](https://www.php.net/manual/ru/language.types.callable.php).

See [./example/map-iterator.php](./example/map-iterator.php)
```php
<?php

use Horat1us\Util\CallbackMapIterator;

$numbers = [1,2,3];
$powCallback = static fn(int $number) => pow($number, $number);
$iterator = new CallbackMapIterator(new \ArrayIterator($numbers), $powCallback);

print_r(iterator_to_array($iterator)); // Array ( [0] => 1, [1] => 4, [2] => 27 )
```

## License
[BSD 3](./LICENSE)
