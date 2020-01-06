<?php
namespace Mold;

function uppercase($obj) {
  return strtoupper($obj->data);
}

function last($obj) {
  $length = $obj->args[0];
  return substr($obj->data, -$length);
}