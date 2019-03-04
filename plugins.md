# Plugins

To setup and load all plugins you do it like below.

```php
<?php
include __DIR__ . '/mold.php';
include __DIR__ . '/plugins/array.php';
include __DIR__ . '/plugins/string.php';
include __DIR__ . '/plugins/generic.php';

class Mold extends MoldBase {
  use MoldPluginArray;
  use MoldPluginString;
  use MoldPluginGeneric;
}

$m = new Mold();
echo $m->var(1000, 2000)->merge(' - ');
```

## array

| Syntax  | Params                                                   | Description                                                               |
| ------  | -------------------------------------------------------- | ------------------------------------------------------------------------- |
| array   | -                                                        | Convert the chain to an array. It should always be added last in a chain. |
| aFormat | int $decimals, string $dec_point, string $thousands_sep  | See [number_format](http://php.net/manual/en/function.number-format.php)  |
| aTrim   | [string $... ]                                           | Args which are not alloed to match items in the array                     |
| implode | -                                                        | See [implode](http://php.net/manual/en/function.implode.php)              |
| unique  | -                                                        | See [unique](http://php.net/manual/en/function.array-unique.php)          |

### Example

```php
$m = new Mold();
$array = $m->var(1000, 2000, -1, '', 2000)->aTrim(-1, '')->unique()->aFormat(2, ',', '.')->implode(' - ')->array();
print_r($array);
```

**Results**

```text
Array
(
    [0] => 1.000,00 - 2.000,00
)
```

## string

| Syntax    | Params                                                  | Description                                                                |
| --------- | ------------------------------------------------------- | -------------------------------------------------------------------------- |
| `string`  | -                                                       | Convert the chain to a string. It should always be added last in the chain |
| `sFormat` | int $decimals, string $dec_point, string $thousands_sep | See [number_format](http://php.net/manual/en/function.number-format.php)   |
| `suffix`  | string $string                                          | Add a string last to the current string, if it's not empty                 |

### Example

```php
$m = new Mold();
$string = $m->var(1000)->sFormat(2, ',', '.')->suffix(' USD');
echo $string;
```

**Results**

```text
1.000,00 USD
```

## generic

| Syntax    | Params                                                | Description                                                                                 |
| --------- | ----------------------------------------------------- | ------------------------------------------------------------------------------------------- |
| `var`     | [mixed $...]                                          | It can be used to set or reset a string or an array. It should always be first in the chain |
| `trim`    | [mixed $...]                                          | A shorthand version of aTrim                                                                |
| `format`  | [mixed $...]                                          | A shorthand for `sFormat` and `aFormat`, depending on the input                             |

## Example

```php
$m = new Mold();
$string = $m->var(1000, -1, 2000)->trim(-1)->format(2, ',', '.')->implode(' - ')->string();
echo $string;
```

**Results**

```text
1.000,00 - 2.000,00
```