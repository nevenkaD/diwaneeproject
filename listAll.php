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
?>
<ul class="tab">
	<li><a href="login.php" class="tablinks">home</a></li>
	<li><a href="listAll.php" class="tablinks active">list all users</a></li>
	<li><a href="logout.php" class="tablinks">logout</a></li>
</ul>
<br>
<div class="tabcontent">
<table style="width:100%">
	<tr>
		<th>Username</th>
		<th>Password</th>
		<th>Date created</th>
	</tr>
	<?php 
	$users = Connection::returnObject()->returnUsers();
	while($user = $users->fetch_object()){ ?>
		<tr>
			<td><?php echo $user->username;?></td>
			<td><?php echo $user->password;?></td>
			<td><?php echo $user->date_created;?></td>
		</tr>
	<?php } ?>
</table> 
</div>
</body>
</html>