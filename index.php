<?php
include __DIR__ . '/lib/mold.php';
include __DIR__ . '/plugins/hello.php';

$mold = new Mold();
echo $mold->set('Hello world')->uppercase()->last(3);