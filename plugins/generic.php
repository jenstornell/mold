<?php
trait MoldPluginGeneric {
  function var(...$var) {
    $this->var = (count($var) == 1) ? $var[0] : $var;
    return $this;
  }

  function trim(...$args) {
    $type = (is_array($this->var)) ? 'a' : 's';
    $this->{$type . 'Trim'}($args);
    return $this;
  }

  function format($decimals = 0, $dec_point = '.', $thousands_sep = ',') {
    $type = (is_array($this->var)) ? 'a' : 's';
    $this->{$type . 'Format'}($decimals, $dec_point, $thousands_sep);

    return $this;
  }
}