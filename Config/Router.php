<?php


class Route{

	private $_uri = array();
	private $_method = array();

	public static function Add( $uri, $method = null , $obj = nul ){
		if( $obj == null ){
			$bt = debug_backtrace();
			$bt[0]["file"] = explode(getcwd(), $bt[0]["file"]);
			$bt[0]["file"] = $bt[0]["file"][1];
			echo 	"File {$bt[0]["file"]} <br>".
					"Line {$bt[0]["line"]} <br>".
					"Router to {$uri} <br>".
					"Router Error : You need to define the router blueprint in 3rd param .";
			exit;
		}
		if( @!is_a($GLOBALS[$obj], "Route") ){
			$GLOBALS[$obj] = new Route();
		}
		$GLOBALS[$obj]->_uri[] = "/".trim($uri, "/");
		if ( $method != null ){
			$GLOBALS[$obj]->_method[] = $method;
		}
	}

	public static function Submit( $obj ){
		$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,strpos( $_SERVER["SERVER_PROTOCOL"],'/'))).'://';
		$_SERVER["REQUEST_URI"] = str_replace($protocol.$_SERVER["HTTP_HOST"], "", $_SERVER["REQUEST_URI"]);
		$GLOBALS["Query"] = $_GET;
		unset($_GET);
		// echo "GET:\n";print_r( $_GET );echo "\n";
		// echo "URI:\n";print_r( @explode( "?", $_SERVER["REQUEST_URI"])[0] );echo "\n";
		$GLOBALS["uri"] = @explode( "?", $_SERVER["REQUEST_URI"])[0];
		$uriGetParam = isset($GLOBALS["uri"]) ? $GLOBALS["uri"] : "/";
		if ( substr($uriGetParam, -1) == "/" && $uriGetParam!="/" ){
			$uriGetParam = substr($uriGetParam, 0, -1);
		}
		foreach ($GLOBALS[$obj]->_uri as $key => $value) {
			if (preg_match("#^$value$#", $uriGetParam, $matches)){
				$GLOBALS["path"] = array_splice($matches, 1, sizeof($matches));
				if( is_string($GLOBALS[$obj]->_method[$key]) ){
					$useMethod = $GLOBALS[$obj]->_method[$key];
				} else {
					parse_str($_SERVER["QUERY_STRING"], $_GET);
					call_user_func($GLOBALS[$obj]->_method[$key], self::GetQuery());
					exit;
				}
			}
		}
		print_r($_SERVER);
	}

	public static function Dump( $obj ){
		$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,strpos( $_SERVER["SERVER_PROTOCOL"],'/'))).'://';
		$_SERVER["REQUEST_URI"] = str_replace($protocol.$_SERVER["HTTP_HOST"], "", $_SERVER["REQUEST_URI"]);
		echo "<pre>\nURI:{$_SERVER["REQUEST_URI"]}\n";
		$GLOBALS["Query"] = $_GET;
		unset($_GET);
		$GLOBALS["uri"] = @explode( "?", $_SERVER["REQUEST_URI"])[0];
		$uriGetParam = isset($GLOBALS["uri"]) ? $GLOBALS["uri"] : "/";
		if ( substr($uriGetParam, -1) == "/" && $uriGetParam!="/" ){
			$uriGetParam = substr($uriGetParam, 0, -1);
		}
		foreach ($GLOBALS[$obj]->_uri as $key => $value) {
			if (preg_match("#^$value$#", $uriGetParam, $matches)){
				$GLOBALS["path"] = array_splice($matches, 1, sizeof($matches));
				if( is_string($GLOBALS[$obj]->_method[$key]) ){
					$useMethod = $GLOBALS[$obj]->_method[$key];
				} else {
					parse_str($_SERVER["QUERY_STRING"], $_GET);
					echo "match {$value} -> {$uriGetParam}\n";
				}
			} else {
				echo "no match {$value} -> {$uriGetParam}\n";
			}
		}
		print_r($_SERVER);
	}
	public static function GetQuery( ){
		parse_str($_SERVER["QUERY_STRING"], $uri);
		return $uri;
	}
	public static function GetPath( ){
		return $GLOBALS["path"];
		//return $GLOBALS[$obj]->_uri;
	}
	public static function Location( $URL ){
		header("Location:{$URL}");
		ob_end_flush();
		exit;
	}
	public static function Debug(){
		echo getcwd()."<br>";
		echo __FILE__;
		echo "<pre>";
		print_r( $_GET );
		print_r( Route::Get( "Route" ) );
	}
}
