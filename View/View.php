<?php

class View{
	public function __construct($path,$data = array()){
		if (file_exists($file = PDIR.'/'.$path.'.php' )) {
			extract($data);
			ob_start();
			require $file;
			echo ob_get_clean();
		}else{
			exit("Görünüm dosyası bulunamadı");
		}
	}

	public function ajaxView($path,$data = array()){
		if (file_exists($file = PDIR.'/'.$path.'.php' )) {
			extract($data);
			ob_start();
			require $file;
			echo ob_get_clean();
		}else{
			exit("Görünüm dosyası bulunamadı");
		}
	}
}

?>
