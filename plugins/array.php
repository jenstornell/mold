<?php
trait MoldPluginArray {
  function array() {
    return (array)$this->var;
  }

  function a() {
    return (array)$this->var;
  }

  function aFormat($decimals = 0, $dec_point = '.', $thousands_sep = ',') {
    $collection = [];
    foreach($this->var as $item) {
      $collection[] = number_format($item, $decimals, $dec_point, $thousands_sep);
    }
    $this->var = $collection;
    return $this;
  }

  function aTrim(...$args) {
    $args = (is_array($args[0])) ? $args[0] : $args;
    $collection = [];
    foreach($this->var as $item) {
      if(in_array($item, $args, true)) continue;      
      $collection[] = $item;
    }
    $this->var = $collection;
    return $this;
  }

  function implode($glue = '') {
    $this->var = implode($this->var, $glue);
    return $this;
  }

  function unique() {
    $this->var = array_unique($this->var);
    return $this;
  }
}