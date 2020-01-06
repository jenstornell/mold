<?php
class Mold {
  public function set($data) {
    $this->data = $data;
    return $this;
  }

  public function __call($name, $args = null) {
    $function = 'Mold\\' . $name;

    if(!function_exists($function)) {
      die('Method ' . $name . ' does not exist');
    }

    $this->args = $args;
    $this->data = $function($this);
    return $this;
  }

  public function array() {
    return (array)$this->data;
  }

  public function string() {
    return (string)$this->data;
  }

  public function int() {
    return (int)$this->data;
  }

  public function float() {
    return (float)$this->data;
  }

  public function __toString() {
    return $this->data;
  }
}