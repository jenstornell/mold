<?php
namespace Mold;

function trim($obj) {
  return \trim($obj->collection, $obj->args[0]);
}

function format($obj) {
  return number_format($obj->collection, ...$obj->args[0]);
}

function explode($obj) {
  return \explode($obj->args[0], $obj->collection);
}

function prefix($obj) {
  return $obj->collection != '' ? $obj->args[0] . '' . $obj->collection : '';
}

function suffix($obj) {
  return $obj->collection .= $obj->collection != '' ? $obj->args[0] : '';
}

function transform($obj) {
  return \strtr($obj->collection, ...$obj->args);
}