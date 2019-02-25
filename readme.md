# Mold

*Version 1.0* [Changelog](changelog.md)

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

// Create Mold class and use the plugins you need
class Mold extends MoldBase {
  use MoldPluginHello;
}

// Create a new instance with a variable to start with
$mold = new Mold('Hello World!');

// Output the result on the screen, in this case "LD!"
echo $mold->upperacase()->last(3);
```

## Write a plugin

To create the plugin that is used in the example above, you can do it like below.

```php
trait MoldPluginHello {
  function uppercase() {
    $this->var = strtoupper($this->var);
    return $this;
  }

  function last($length) {
    $this->var = substr($this->var, -$length);
    return $this;
  }
}
```

- It is a `trait` not a `class`. Be sure to get the first line right.
- You can use any name of the class but I recommend `MoldPlugin` as a prefix.
- Use `$this->var` to get and set the current variable.
- Always `return $this` (not `$this->var`). Else the chain will break.

## Requirements

- PHP 7+

## Disclaimer

This plugin is provided "as is" with no guarantee. Use it at your own risk and always test it yourself before using it in a production environment. If you find any issues, please [create a new issue](issues/new).

## License

MIT

## Donate

If you want to make a donation, you can do that by sending any amount https://www.paypal.me/DevoneraAB