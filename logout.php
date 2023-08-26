<?php

session_start();



session_destroy();

$_SESSION["errormsg"] = '';


header("location: onlibr.xhtml");

exit();