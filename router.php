<?php
class Router{

	public static $routes = [];
	public static $methods = [];
	public static $callback = [];

	public static function __callstatic($method, $params){
		array_push(self::$routes, $params[0]);
		array_push(self::$methods, strtoupper($method));
		array_push(self::$callback, $params[1]);
	}

	public static function redirect($path, array $message = []){
		$_SESSION['message'] = $message;
		header("Location:{$path}");
	}

	public static function refresh($path, $time){
		header("Refresh:{$time}; url={$path}");
	}

	public static function dispatch(){

		$req_uri = $_SERVER['REQUEST_URI'];
		if (substr($req_uri,0,strlen(\ROOTFOLDER)+1) === \ROOTFOLDER.'/') {
			$path = substr($req_uri,strlen(\ROOTFOLDER));
		}else{
			$path = $req_uri;
		}

		$uri = urldecode(parse_url($path, PHP_URL_PATH));

		foreach (self::$routes as $routeKey => $route) {
			$found_route = false;
			if (preg_match('~'.$route.'$~', $uri, $matched) && self::$methods[$routeKey] == $_SERVER['REQUEST_METHOD']) {
				$found_route = true;
				$parts = explode('/', $matched[0]);
				array_shift($parts);
				array_shift($parts);
				if (is_string(self::$callback[$routeKey])) {
					if ($eslesme = explode('@', self::$callback[$routeKey])) {
						$callback_class = new $eslesme[0]();
						$callback_class->{$eslesme[1]}($parts);
						
					}
				}else{
					call_user_func_array(self::$callback[$routeKey], $parts);
				}
				break;
			}else{
				//echo "<br>uygulanmadı<br>";
			}
		}

		if ($found_route == false) {
			echo "Sayfa bulunamadı";
		}
	}
}

?>