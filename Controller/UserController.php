<?php

class UserController extends Controller{
	public $model;
	public function __construct(){
		$this->model = new UserModel();
	}
	public function viewLogin(){
		return new View('login');
	}
	public function viewRegister(){
		return new View('register');
	}

	public function register(){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		if ($this->checkUser($email)) {
			$message['status'] = 'error';
			$message['message'] = "Kullandığınız E-posta sistemde adresi mevcut";
			Router::redirect('register',$message);
		}else{
			if ($this->model->register($name,$email,$password)) {
				$message['status'] = 'alert';
				$message['message'] = "Başarılı bir şekilde kayıt oldunuz! \n Bilgilerinizle giriş yapabilirsiniz.";
				Router::redirect('login',$message);
			}else{
				$message['status'] = 'error';
				$message['message'] = "Kayıt esnasında bir hata oluştu.\n Lütfen bilgilerinizi kontrol edip tekrar deneyiniz";
				Router::redirect('register',$message);
			}
		}
	}

	public function login(){
		$email = $_POST['email'];
		$password	 = md5($_POST['password']);
		$cevap = $this->model->login($email,$password);
		if (empty($cevap)) {
			$message['status'] = 'error';
			$message['message'] =  "Kullanıcı Bilgileriniz Hatalı!\n Lütfen Kontrol Edin.";
			$this->py($message);
			Router::redirect('login',$message);
			return;
		}else{
			$message['status'] = 'success';
			$message['message'] =  "Başarılı Bir Şekilde Giriş Yaptınız!\n Yönlendiriliyorsunuz.\n Lütfen Bekleyiniz.";
			$_SESSION['login'] = true;
			$_SESSION['name'] = $cevap['name'];	
			$_SESSION['id'] = $cevap['id'];
			Router::redirect('login',$message);
			return;
		}
		//Router::redirect('/');
	}

	public function checkUser($email){
		if ($this->model->query("SELECT id FROM userlogin WHERE email = ? ",array($email))) {
			return true;
		}
	}
}
?>