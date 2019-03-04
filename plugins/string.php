<?php
trait MoldPluginString {
  function string() {
    return (string)$this->var;
  }

  function s() {
    return (string)$this->var;
  }

  function email() {
    $email = '';
    for($i=0; $i < strlen($this->var); $i++){
        $email .= "&#" . ord($this->var[$i]) . ";";
    }
    $this->var = sprintf('<a href="mailto:%s">%s</a>', $email, $email);
    return $this;
  }

  function explode($delimiter = '') {
    $this->var = explode($delimiter, $this->var);
    return $this;
  }

  function link($label = null) {
    $label = ($label) ? $label : $this->var;
    $this->var = sprintf('<a href="%s">%s</a>', $this->var, $label);
    return $this;
  }

  function prefix($prefix = '') {
    $this->var = ($this->var != '') ? $prefix . '' . $this->var : '';
    return $this;
  }

  function sFormat($decimals = 0, $dec_point = '.', $thousands_sep = ',') {
    $this->var = number_format($this->var, $decimals, $dec_point, $thousands_sep);
    return $this;
  }

  function suffix($suffix = '') {
    $this->var .= ($this->var != '') ? $suffix : '';
    return $this;
  }
}