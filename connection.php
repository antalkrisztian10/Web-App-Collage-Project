<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
$db = mysqli_connect("localhost", "root", "");
mysqli_select_db($db, "gym_genius");
session_start();

require_once 'functions.php';
?>
