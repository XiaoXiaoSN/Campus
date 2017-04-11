<?php
	Models::Load( "AccountLogin" );

	if( isset($_POST["a"]) ){
		$Account = $_POST["a"];
	}

	if( !AccountValidation( $Account ) ){
		Util::Status(false, "Account is illegal"); 
		exit;
	}


/*
	//sent to db 
	if ( AccountExist( $Account ) ){
		//Generate token
		$_SESSION["SignIn"]["Token"]	= TokenGenerate( Util::GetIP() );
		$_SESSION["SignIn"]["Account"]	= $Account;
	
	}else{
		Util::Status(false, "Account is not exist"); 
	}
*/
	
	//now we dont check account is exist, just generate token
	$_SESSION["SignIn"]["Token"]	= TokenGenerate( Util::GetIP() );
	$_SESSION["SignIn"]["Account"]	= $Account;

	Util::Status(true, $_SESSION["SignIn"]["Token"]); 


	function TokenGenerate( $Key, $Expire = null  ){
		if($Expire == null) $Expire = date("yYmMdDhHi");
		$Key.=$Expire;
		return password_hash($Key, PASSWORD_BCRYPT);
	}
