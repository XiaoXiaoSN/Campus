<?php


class Models{
	
	public static function Load( $model ){

		if( file_exists( "Models/{$model}.php" ) ){

			require_once( "Models/{$model}.php" );

		} else {

			Util::Debug(
				"Models",
					"/Config/Models.php",
					array(
						"DebugEnabled" =>
							"<h2>The {$model} model is not exists in /Models </h2>",
						"DebugDisabled" =>
							"<h2>Model not properly installed </h2>",
					),
					true,	//Clean Screen
					true 	//php OFF
			);
		}

	}

}