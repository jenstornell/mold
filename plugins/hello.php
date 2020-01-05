<?php
namespace Mold;

function uppercase($obj) {
  return strtoupper($obj->collection);
}

function last($obj, $args) {
  $length = $args[0];
  return substr($obj->collection, -$length);
}