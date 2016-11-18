<?php
class User{
	private $id;
	private $username;
	private $password;
	private $date_created;
	
	public function __construct($id, $username, $password, $date_created){
		$this->id=$id;
		$this->username=$username;
		$this->password=$password;
		$this->date_created=$date_created;
	}
	public function getid(){
		return $this->id;
	}
	public function getusername(){
		return $this->username;
	}
	public function getpassword(){
		return $this->password;
	}
	
	public function getdate_created(){
		return $this->date_created;
	}
	
	public function setid($id){
		$this->id=$id;
	}
	
	public function setusername($username){
		$this->username=$username;
	}
	
	public function setpassword($password){
		$this->password=$password;
	}
	
	public function setdate_created($date_created){
		$this->date_created=$date_created;
	}
	
}
?>