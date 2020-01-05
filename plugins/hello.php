<?php
namespace Mold;

function uppercase($obj) {
  return strtoupper($obj->collection);
}

function last($obj) {
  $length = $obj->args[0];
  return substr($obj->collection, -$length);
}