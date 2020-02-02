<?php
/**
 * 
 */
class UserModel extends Model{
	
	public function login($email, $password){
		$sql = "SELECT * FROM userLogin WHERE email = ? AND password = ?";
		$cevap = $this->fetch($sql,array($email,$password));
		return $cevap;
	}

	public function register($name, $email, $password){
		$sql = "INSERT INTO userlogin (name, email, password) VALUES (?, ?, ?)";
		$cevap = $this->query($sql,array($name,$email,$password));
		return $cevap;
	}
}
?>