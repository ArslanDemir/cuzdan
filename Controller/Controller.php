<?php
class Controller{
	

	public function py($string){
		echo "<pre>";
		print_r($string);
		echo "</pre>";
		return;
	}
	public function redirect($path,array $message = []){
		$_SESSION['message'] = $message;
		header("Location:{$path}");
	}
	public function refresh($path,$time){
		header( "Refresh:{$time}; url={$path}");
	}
}
?>