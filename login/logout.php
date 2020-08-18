<?php

session_start();

$_SESSION['data']['username']="";
unset($_SESSION['data']['username']);
session_unset();
session_destroy(); 
header ("Location: http://localhost/spkrinaldy");
?>