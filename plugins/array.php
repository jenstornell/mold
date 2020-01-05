<?php
namespace Mold;

function array_format($obj) {
  $collection = [];
  foreach($obj->collection as $i => $number) {
    $collection[] = number_format($number, ...$obj->args[0][$i]);
  }
  return $collection;
}

function array_trim($obj) {
  $collection = [];
  foreach($obj->collection as $item) {
    foreach($obj->args as $arg) {
      if(in_array($item, $arg, true)) continue;      
      $collection[] = $item;
    }
  }
  return $collection;
}

function implode($obj) {
  $glue = $obj->args[0];
  return \implode($obj->collection, $glue);
}

function unique($obj) {
  return array_unique($obj->collection);
}