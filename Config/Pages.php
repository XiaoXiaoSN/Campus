<?php
require_once( "Config/Views.php" );
class Page extends Views{

	private static $title = "";

	public static function Title( $title ){
		self::$title = $title;
	}
	public static function Init( $func = null ){
		echo "<!DOCTYPE html>\n";
		echo "<html>\n";
		echo "<head>\n";

		echo "\t<title>".self::$title."</title>\n";
		echo "\t<meta charset='utf-8'>\n";
		echo "\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0\" />\n";
		if(strlen(site_icon)>0){
			echo "\t<link rel=\"shortcut icon\" href=\"".site_icon."\" type=\"image/x-icon\" />";
		}
		if( !is_null($func) )
			call_user_func( $func );
		echo "</head>\n";
	}
	public static function TagOn( $tag, $attr = null ){
		if( is_null( $attr ) ){
			echo "<{$tag}>\n";
		} else {
			echo "<{$tag}";
			foreach ($attr as $key => $value) {
				$value = str_replace('\'', '\\\'', $value);
				echo " $key='$value'";
			}
			echo ">";
		}
	}
	public static function TagOff( $tag ){
		echo "</{$tag}>\n";
	}



	// public static function Body( $attr = null, $func = null ){
	// 	if( is_null( $attr ) ){
	// 		echo "<body>\n";
	// 	} else {
	// 		echo "<body";
	// 		foreach ($attr as $key => $value) {
	// 			$value = str_replace('\'', '\\\'', $value);
	// 			echo " $key='$value'";
	// 		}
	// 		echo ">";
	// 	}
	// 	if( !is_null($func) )
	// 		call_user_func( $func );
	// 	echo "</body>";
	// }
	// public static function Tag( $tag, $attr = null, $callback = null ){
	// 	if( is_null( $attr ) ){
	// 		echo "<{$tag}>\n";
	// 	} else {
	// 		echo "<{$tag}";
	// 		foreach ($attr as $key => $value) {
	// 			$value = str_replace('\'', '\\\'', $value);
	// 			echo " $key='$value'";
	// 		}
	// 		echo ">";
	// 	}
	// 	if( is_callable($callback) ){
	// 		call_user_func($callback);
	// 	}
	// 	echo "</{$tag}>\n";
	// }
}