<?php
namespace Mold;

function trim($obj, $args) {
  return \trim($obj->collection, $args[0]);
}

function format($obj, $args) {
  return number_format($obj->collection, ...$args[0]);
}

function explode($obj, $args) {
  return \explode($args[0], $obj->collection);
}

function prefix($obj, $args) {
  return $obj->collection != '' ? $args[0] . '' . $obj->collection : '';
}

function suffix($obj, $args) {
  return $obj->collection .= $obj->collection != '' ? $args[0] : '';
}

function transform($obj, $args) {
  return \strtr($obj->collection, ...$args);
}