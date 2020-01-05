<?php
include __DIR__ . '/../lib/mold.php';
include __DIR__ . '/../plugins/hello.php';
include __DIR__ . '/../plugins/string.php';
include __DIR__ . '/../plugins/array.php';

$mold = new Mold();

echo $mold->set('Hello world')->uppercase()->last(3);
echo $mold->set('asda/')->trim('/');
echo $mold->set(123456789.5342346)->format([2, ",", "."]);
$array = $mold->set('aa/bb/cc')->explode('/')->array();
echo $mold->set('test')->transform(['te' => '12']);
echo $mold->set(['23', 232])->implode('/');
print_r($mold->set(['aa', 'bb', 'aa'])->unique()->array());
$test = $mold->set([1234567, 23456.3])->array_format([[2, ',', '.'], [1, '_', '*']])->array();
print_r($test);
$test = $mold->set(['a', 'b', 'c'])->array_trim(['b', 'c'])->array();
print_r($test);