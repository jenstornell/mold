# Mold

_Version 2.0_ [Changelog](changelog.md)

A PHP library to chain methods like `$mold->upperacase()->last(3)`.

## In short

- Tiny library (below 1 kB)
- Easy to write own plugins
- No dependencies
- Support for arguments

## Usage

Here is an example of how it will look like.

```php
// Include MoldBase class
include __DIR__ . '/mold.php';

// Include plugins
include __DIR__ . '/plugins/hello.php';

// Create a new instance
$mold = new Mold();

// Output the result on the screen, in this case "LD!"
echo $mold->set('Hello World!')->upperacase()->last(3);
```

## Write a plugin

To create the plugin that is used in the example above, you can do it like below.

```php
<?php
namespace Mold;

function trim($obj) {
  return \trim($obj->collection, $obj->args[0]);
}
```

- You need the namespace `Mold`.
- You need to include it as an internal file.

With the plugin above you can do something like below, which will output `Hello World`.

```php
include __DIR__ . '/mold.php';
include __DIR__ . '/plugins/my-plugin.php';

$mold = new Mold();

echo $mold->set('Hello World!')->trim('!');
```

## Requirements

- PHP 7+

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment. If you find any issues, please [create a new issue](issues/new).

## License

MIT

## Donate

If you want to make a donation, you can do that by sending any amount https://www.paypal.me/DevoneraAB
