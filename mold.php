<?php
class MoldBase {
  public $var;

  public function __construct($var = null) {
    $this->var = $var;
  }

  public function __toString() {
    return $this->var;
  }
}