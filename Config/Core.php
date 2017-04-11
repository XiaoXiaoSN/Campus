<?php

class Core{


	public static function Dump( $Var, $Callback = false ){
		echo "<pre>";
		if( !$Callback ){
			echo $Var;
		} else if ( is_callable( $Callback )) {
			call_user_func( $Callback, $Var );
		} else if(is_numeric($Callback) == 1) {
			var_dump($Var);
		}
		echo "</pre>";
	}
	public static function Debug( $System, $File, $Message=null, $CleanScreen=false, $PHPOff=false ){
		if( $CleanScreen ) ob_end_clean();	
		if( _PURE_DEBUG_ === true ){
			$Debug = current( debug_backtrace() );
			if( str_replace(getcwd(), "", $Debug["file"]) == $File ){
				$Debug = next( debug_backtrace() );
			}
			$Debug["file"] = str_replace(getcwd(), "", $Debug["file"]);

			if( is_string($Message) ){
				echo "<br><b>{$System} : {$Message} in {$Debug["file"]} on line {$Debug["line"]}</b><br>";
			} else if( is_array($Message) && $Message["DebugEnabled"] ){
				echo "<br><b>{$System} : {$Message["DebugEnabled"]}</b><br>";
			} else {
				echo "<pre style='background-color:grey;font-family:Consolas'>";
					debug_print_backtrace();
					print_r(debug_backtrace());
				echo "</pre>";	
			}
		} else {
			if( is_array($Message) && $Message["DebugDisabled"] ){
				echo $Message["DebugDisabled"];
			} else {
				echo "Server temporary unavailable : Functional issue in {$System} .";
			}
		}
		if( $PHPOff ) exit;
	}

}