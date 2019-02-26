<?php
trait MoldPluginString {
  function string() {
    return (string)$this->var;
  }

  function sFormat($decimals = 0, $dec_point = '.', $thousands_sep = ',') {
    $this->var = number_format($this->var, $decimals, $dec_point, $thousands_sep);
    return $this;
  }

  function suffix($suffix = '') {
    $this->var .= ($this->var != '') ? ' ' . $suffix : '';
    return $this;
  }
}