# Map Iterator (PHP)
[![codecov](https://codecov.io/gh/Horat1us/map-iterator/branch/master/graph/badge.svg?token=MnQVUwASBj)](https://codecov.io/gh/Horat1us/map-iterator)

Итераторы для преобразования всех элементов дочернего итератора.

Вдохновлено [\FilterIterator](https://www.php.net/manual/ru/class.filteriterator.php)
и [\CallbackFilterIterator](https://www.php.net/manual/ru/class.callbackfilteriterator.php).

## Установка
При помощи [composer](https://getcomposer.org/)
```bash
composer require horat1us/map-iterator:^1.0
```

## Использование
### MapIterator
Преобразование элементов дочернего итератора с использованием абстрактного метода.

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
### CallbackMapIterator (рекомендуется)
Преобразование элементов дочернего класса с использованием
[функции обратного вызова (callback/callable)](https://www.php.net/manual/ru/language.types.callable.php).

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
[BSD 3](./LICENSE) - 
