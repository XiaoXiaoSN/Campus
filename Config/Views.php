<?php

class Views{

	/**
	 *  @name  View
	 *	@param File Name
	 *	@param Callback Funtion | Print | Return
	 *  Use
	 *	
	 *	@method  Print whole file
	 *  Page::HTML( "CourseInfo_TimeTable" );
	 *
	 *	@method  Call User Function
	 *  Page::HTML( "CourseInfo_TimeTable", function( $HTML ){
 	 *		#Code..
	 *	});
	 *
	 * 	@method  Return File's Content
	 *	Page::HTML( "CourseInfo_TimeTable", 1 );
	 *	
	 *
	 */

	private static $File;
	private static $HTML;


	private static function Load( $View ) {
		if( @!is_null($GLOBALS["Pure"]["Cache"]["View"][$View]) ){
			self::Release();
		    self::$File = new self();
			self::$File->HTML =	$GLOBALS["Pure"]["Cache"]["View"][$View];
		} else {
			if ( @!file_exists( "Views/{$View}.view.htm" ) ){
				throw new Exception( "{$View} is not exists.", 1);
			}
			self::Release();
		    self::$File = new self();
			self::$File->HTML = file_get_contents( "Views/{$View}.view.htm" );
			$GLOBALS["Pure"]["Cache"]["View"][$View] = self::$File->HTML;
		}
	}
	public static function HTML( $View, $Callback = null ) {
		try {
			self::Load($View);
			if( @is_callable($Callback) ){
				call_user_func( $Callback,self::$File->HTML );
			} else if(@is_numeric($Callback) == 1) {
				return self::$File->HTML;
			} else {
				echo self::$File->HTML;
			}
		} catch (Exception $e) {
			Util::Debug(
				"Pages",
					"/Config/Views.php",
					array(
						"DebugEnabled" =>
							"<h2>".$e->getMessage()."</h2>",
						"DebugDisabled" =>
							"Something is missing"
					),
					false,	//Clean Screen
					false 	//php OFF
			);
		}
		return true;
	}
	public static function Item( $View, $Items, $Callback = null ) {
		try {
			self::Load($View);
			$HTML = self::$File->HTML;
			foreach ( $Items as $key => $Data) {
				$HTML = str_replace( "{{{$key}}}" , $Data, $HTML);
			}
			$HTML = preg_replace("/{{\w+}}/", "", $HTML);
			if( is_callable($Callback) ){
				call_user_func( $Callback, $HTML );
			} else if(is_numeric($Callback) == 1) {
				return $HTML;
			} else {
				echo $HTML;
			}
		} catch (Exception $e) {
			Util::Debug(
				"Pages",
					"/Config/Views.php",
					array(
						"DebugEnabled" =>
							"<h2>".$e->getMessage()."</h2>",
						"DebugDisabled" =>
							"Something is missing"
					),
					false,	//Clean Screen
					false 	//php OFF
			);
		}
	}
	public static function Release() {
		@self::$File->File		= nul;
		@self::$File->HTML		= nul;
	}

}




