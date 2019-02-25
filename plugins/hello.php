<?php
trait MoldPluginHello {
  function uppercase() {
    $this->var = strtoupper($this->var);
    return $this;
  }

  function last($length) {
    $this->var = substr($this->var, -$length);
    return $this;
  }
}