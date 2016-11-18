<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
	<p color="black"><strong>Username:</strong></p>
	<input name="username" type="text" >
	<br>
	<p color="black"><strong>Password:</strong></p>
	<input name="password" type="password" >
	<br>
	<br>
	<input name="login" type="submit" value="Login" >
	<input name="register" type="submit" value="Register" >
</form>
<?php
include_once "connection.php";
if(isset($_POST["login"])){
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);
	$user = Connection::returnObject()->returnUser($username);
	if($user==null){
		echo '<script language="javascript">
		alert("The user with that username does not exist!")
		</script>';	
	}
	else{
		if($user->getpassword() == $password){
			session_start();
			$_SESSION['login']= "go";
			$_SESSION['username'] = $username;
			header("Location: login.php");
		}
		else{
			echo '<script language="javascript">
			alert("Wrong password!")
			</script>';
		}
	}
}
if(isset($_POST["register"])){
	$username = trim($_POST["username"]);
	$password = trim($_POST["password"]);
	if($username != '' && $password != ''){
		$user = Connection::returnObject()->returnUser($username);
		if($user == null){
			$date_created = date("Y-m-d H:i:s");
			$user = new User("",$username,$password,$date_created);
			Connection::returnObject()->insertUser($user);
		}
		else{
			echo '<script language="javascript">
			alert("The user with that username already exists!")
			</script>';
		}
	}
	else{
		echo '<script language="javascript">
		alert("Username and password can not be empty string!")
		</script>';
	}
}
?>	
</body>
</html>