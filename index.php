<?php
// Include MoldBase
include __DIR__ . '/mold.php';

// Include plugins
include __DIR__ . '/plugins/hello.php';

// Create Mold class and use plugins
class Mold extends MoldBase {
  use MoldPluginHello;
}

// Create new instance with a variable to start with
$mold = new Mold('Hello World!');

// Output the results
echo $mold->uppercase()->last(3);