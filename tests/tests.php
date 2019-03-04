<?php
include __DIR__ . '/../mold.php';
include __DIR__ . '/../plugins/hello.php';
include __DIR__ . '/../plugins/array.php';
include __DIR__ . '/../plugins/string.php';
include __DIR__ . '/../plugins/generic.php';

class Mold extends MoldBase {
  use MoldPluginHello;
  use MoldPluginArray;
  use MoldPluginString;
  use MoldPluginGeneric;
}

$m = new Mold('Hello World!');
$out = $m->uppercase()->last(3);

$message = '';

if($out != 'LD!') $message = '$m->uppercase()->last(3)';

// STRING

// string
if(gettype($m->var("test")->string()) !== 'string')
$message = '$m->var("test")->string()';

// s
if(gettype($m->var("test")->s()) !== 'string')
$message = '$m->var("test")->s()';

// email
if($m->var("test@example.com")->email()->s() != '<a href="mailto:&#116;&#101;&#115;&#116;&#64;&#101;&#120;&#97;&#109;&#112;&#108;&#101;&#46;&#99;&#111;&#109;">&#116;&#101;&#115;&#116;&#64;&#101;&#120;&#97;&#109;&#112;&#108;&#101;&#46;&#99;&#111;&#109;</a>')
$message = '$m->var("test@example.com")->email()->s()';

// explode
$a = $m->var("1,2")->explode(",")->array();
if($a[0] != '1' || $a[1] != "2")
$message = '$m->var("1,2")->explode(",")->array()';

// link
if($m->var("https://example.com")->link("Hello")->s() != '<a href="https://example.com">Hello</a>')
$message = '$m->var("https://example.com")->link("Hello")->s()';

// prefix
if($m->var(" world")->prefix("hello")->s() != 'hello world')
$message = '$m->var(" world")->prefix("hello")->s()';

// sFormat
if($m->var(1000)->sFormat(2, ',', '.') != '1.000,00')
$message = '$m->var(1000)->sFormat(2, ",", ".")';

// suffix
if($m->var("hello")->suffix(" world")->s() != 'hello world')
$message = '$m->var("hello")->suffix(" world")->s()';

// ARRAY

// array

if(gettype($m->var(1,2)->array()) !== 'array')
$message = '$m->var(1,2)->array()';

// aFormat
$a = $m->var(1000, 2000)->aFormat(2, ',', '.')->array();
if($a[0] != '1.000,00' || $a[1] != '2.000,00')
$message = '$m->var(1000, 2000)->aFormat(2, ",", ".")->array()';

// aTrim
$a = $m->var(1000, -1, 2000, '', 'a')->aTrim(-1, '', 'a')->array();
if($a[0] !== 1000 || $a[1] !== 2000 || isset($a[2]))
$message = '$m->var(1000, -1, 2000, "", "a")->aTrim(-1, "", "a")->array()';

// implode
if($m->var(1, 2)->implode("-")->string() != '1-2')
$message = '$m->var(1, 2)->implode("-")->string()';

// unique
$a = $m->var(1,2,2)->unique()->array();
if($a[0] !== 1 || $a[1] !== 2 || isset($a[2]))
$message = '$m->var(1,2,2)->unique()->array()';

// GENERIC

// var
if($m->var("test") != 'test')
$message = '($m->var("test")';

$a = $m->var(1,2)->array();
if($a[0] !== 1 || $a[1] !== 2)
$message = '$m->var(1,2)->arr()';

// trim
$a = $m->var(1000, -1, 2000, '', 'a')->trim(-1, '', 'a')->array();
if($a[0] !== 1000 || $a[1] !== 2000 || isset($a[2]))
$message = '$m->var(1000, -1, 2000, "", "a")->trim(-1, "", "a")->array()';

// format
if($m->var(1000)->format(2, ",", ".") != '1.000,00')
$message = '$m->var(1000)->format(2, ",", ".")';

$a = $m->var(1000, 2000)->format(2, ',', '.')->array();
if($a[0] != '1.000,00' || $a[1] != '2.000,00')
$message = '$m->var(1000, 2000)->format(2, ",", ".")->array()';

// MESSAGE

// EXAMPLES

// array

$s = $m->var(1000, 2000, -1, "", 2000)->aTrim(-1, "")->unique()->aFormat(2, ",", ".")->implode(" - ")->string();
if($s != '1.000,00 - 2.000,00')
$message = '$m->var(1000, 2000, -1, "", 2000)->aTrim(-1, "")->unique()->aFormat(2, ",", ".")->implode(" - ")->string()';

$s = $m->var(1000)->sFormat(2, ',', '.')->suffix(" USD")->string();
if($s != '1.000,00 USD')
$message = '$m->var(1000)->sFormat(2, ",", ".")->suffix(" USD")';

$s = $m->var(1000, -1, 2000)->trim(-1)->format(2, ",", ".")->implode(" - ")->string();
if($s != '1.000,00 - 2.000,00')
$message = '$m->var(1000, -1, 2000)->trim(-1)->format(2, ",", ".")->implode(" - ")->string()';

echo $message;