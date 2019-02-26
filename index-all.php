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
$string = $m->var(1000, 2000, -1, "", 2000)->aTrim(-1, "")->unique()->aFormat(2, ",", ".")->implode(" - ")->string();

// Output
// 1.000,00 - 2.000,00

echo $string;