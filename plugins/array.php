<?php
namespace Mold;

function array_format($obj) {
  $data = [];
  foreach($obj->data as $i => $number) {
    $data[] = number_format($number, ...$obj->args[0][$i]);
  }
  return $data;
}

function array_trim($obj) {
  $data = [];
  foreach($obj->data as $item) {
    foreach($obj->args as $arg) {
      if(in_array($item, $arg, true)) continue;      
      $data[] = $item;
    }
  }
  return $data;
}

function implode($obj) {
  $glue = $obj->args[0];
  return \implode($obj->data, $glue);
}

function unique($obj) {
  return array_unique($obj->data);
}