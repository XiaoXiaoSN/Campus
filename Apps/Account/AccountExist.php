<?php
	Models::Load( "AccountLogin" );

	if( isset($_POST["a"]) ){
		$Account = $_POST["a"];
	}

	if( !AccountValidation( $Account ) ){
		Util::Status(false, "Account is illegal"); 
		exit;
	}

	//sent to db 
	if ( AccountExist( $Account ) ){
		Util::Status(true, "Account is exist"); 
	}else{
		Util::Status(false, "Account is not exist"); 
	}