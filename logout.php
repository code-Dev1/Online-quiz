<?php

require_once 'autoLoad.php';

$auth = new Auth;

$auth->logout();
header("location:index");
