<?php
/**
* 
*/
class Assets
{
	
	public static function Import( $Asset ){
		$found = -1;
		if( file_exists("Resource/$Asset/css/$Asset.min.css") ){
			self::Style("/Resource/$Asset/css/$Asset.min.css");
			$found = 1;
		} else if( file_exists("Resource/$Asset/$Asset.min.css") ){
			self::Style("/Resource/$Asset/$Asset.min.css");
			$found = 1;
		} else if ( file_exists("Resource/$Asset/$Asset.css") ){
			self::Style("/Resource/$Asset/$Asset.css");
			$found = 1;
		} else if( file_exists("Resource/css/$Asset.min.css") ){
			self::Style("/Resource/css/$Asset.min.css");
			$found = 1;
		} else if ( file_exists("Resource/css/$Asset.css") ){
			self::Style("/Resource/css/$Asset.css");
			$found = 1;
		} else if( file_exists("Resource/$Asset.min.css") ){
			self::Style("/Resource/$Asset.min.css");
			$found = 1;
		} else if ( file_exists("Resource/$Asset.css") ){
			self::Style("/Resource/$Asset.css");
			$found = 1;
		} else if( file_exists("Resource/$Asset.min.css") ){
			self::Style("/Resource/$Asset.min.css");
			$found = 1;
		} else if ( file_exists("Resource/$Asset.css") ){
			self::Style("/Resource/$Asset.css");
			$found = 1;
		}
		if( file_exists("Resource/$Asset/js/$Asset.min.js") ){
			self::Script("/Resource/$Asset/js/$Asset.min.js");
			$found = 1;
		} else if( file_exists("Resource/$Asset/$Asset.min.js") ){
			self::Script("/Resource/$Asset/$Asset.min.js");
			$found = 1;
		} else if ( file_exists("Resource/$Asset/$Asset.js") ){
			self::Script("/Resource/$Asset/$Asset.js");
			$found = 1;
		} else if( file_exists("Resource/js/$Asset.min.js") ){
			self::Script("/Resource/js/$Asset.min.js");
			$found = 1;
		} else if ( file_exists("Resource/js/$Asset.js") ){
			self::Script("/Resource/js/$Asset.js");
			$found = 1;
		} else if( file_exists("Resource/$Asset.min.js") ){
			self::Script("/Resource/$Asset.min.js");
			$found = 1;
		} else if ( file_exists("Resource/$Asset.js") ){
			self::Script("/Resource/$Asset.js");
			$found = 1;
		}


		if( $found != 1 )
			Util::Debug(
				"Assets",
					"/Config/Assets.php",
					array(
						"DebugEnabled" =>
							"<h2>The {$Asset} is not exists in /Resource </h2>",
					),
					true,	//Clean Screen
					true 	//php OFF
			);

	}

	public static function Script( $misc ){
		if( is_callable( $misc ) ){
			echo "<script>\n";
			call_user_func( $misc );
			echo "</script>\n";
		} else if ( is_string( $misc ) ) {
			echo "<script src=\"{$misc}\"></script>";
		}
	}

	public static function Style( $misc ){
		if( is_callable( $misc ) ){
			echo "<style>\n";
			call_user_func( $misc );
			echo "</style>\n";
		} else if ( is_string($misc) ) {
			echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"{$misc}\">";
		}
	}
}