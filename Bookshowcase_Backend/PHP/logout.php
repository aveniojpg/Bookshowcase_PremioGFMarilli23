<?php

session_start();

$_SESSION = array();

session_destroy();

header("location: ../HTML/index.html");
exit;
