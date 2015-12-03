<?php

session_start();

include 'load.php';

$misc = new Misc();

$misc->logout("index");