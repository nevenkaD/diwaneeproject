<?php
include_once "domain/user.php";

class Connection{
	static $connection;
	private $link;
	
	public function __construct(){
		$this->link=new mysqli("localhost", "root", "", "diwanee");
	}
	
	public static function returnObject(){
		if(self::$connection == null){
			self::$connection = new Connection();
		}
		return self::$connection;
	}
	     
	public function returnUser($username){
		$username2=mysqli_real_escape_string($this->link,$username);
		$sql= "SELECT * FROM users WHERE username='".$username2."'";
		if(!$q=$this->link->query($sql)){
			echo '<script language="javascript">
			alert("SQL error!")
			</script>';
			exit();
		}
		if($q->num_rows==0){
			$user=null;
		}
		else{
			if($row=$q->fetch_object()){
				$user = new User($row->id,$row->username,$row->password,$row->date_created);
			}
		}
		return $user;
	}
	
	public function insertUser($user){
		$sql="INSERT INTO users (username, password, date_created) VALUES ('".$user->getusername()."','".$user->getpassword()."','".$user->getdate_created()."')";
		if(!$q=$this->link->query($sql)){
			echo '<script language="javascript">
			alert("SQL error!")
			</script>';
			exit();
		}
		else{
			echo '<script language="javascript">
			alert("You have successfully registered. Please log in.")
			</script>';
		}
	}
	
	public function returnUsers(){
		$sql="SELECT username, password, date_created FROM users ORDER BY date_created";
		$q=$this->link->query($sql);
		if(!$q){
			echo '<script language="javascript">
			alert("SQL error!")
			</script>';
			exit();
		}
		return $q;
	}		
}
?>

