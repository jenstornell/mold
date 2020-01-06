<?php
namespace Mold;

function trim($obj) {
  return \trim($obj->data, $obj->args[0]);
}

function format($obj) {
  return number_format($obj->data, ...$obj->args[0]);
}

function explode($obj) {
  return \explode($obj->args[0], $obj->data);
}

function prefix($obj) {
  return $obj->data != '' ? $obj->args[0] . '' . $obj->data : '';
}

function suffix($obj) {
  return $obj->data .= $obj->data != '' ? $obj->args[0] : '';
}

function transform($obj) {
  return \strtr($obj->data, ...$obj->args);
}