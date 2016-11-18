<?php
session_start();
$_SESSION['login'] = "stop";
header("Location: index.php");
exit;
?>
