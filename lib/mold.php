<?php
class Mold {
  public function set($collection) {
    $this->collection = $collection;
    return $this;
  }

  public function __call($name, $args = null) {
    $function = 'Mold\\' . $name;

    if(!function_exists($function)) {
      die('Method ' . $name . ' does not exist');
    }

    $this->args = $args;
    $this->collection = $function($this);
    return $this;
  }

  public function array() {
    return (array)$this->collection;
  }

  public function string() {
    return (string)$this->collection;
  }

  public function int() {
    return (int)$this->collection;
  }

  public function float() {
    return (float)$this->collection;
  }

  public function __toString() {
    return $this->collection;
  }
}