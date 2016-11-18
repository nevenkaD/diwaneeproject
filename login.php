<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include_once "connection.php";
session_start();
if ($_SESSION['login'] != "go"){
    header("Location: index.php");
	exit();
}
$username = $_SESSION['username'] ;
?>
<ul class="tab">
	<li><a href="login.php" class="tablinks active">home</a></li>
	<li><a href="listAll.php" class="tablinks">list all users</a></li>
	<li><a href="logout.php" class="tablinks">logout</a></li>
</ul>
<br>
<div class="tabcontent">
<p>Hello <?php echo $username; ?>! </p>
</div>
</body>
</html>