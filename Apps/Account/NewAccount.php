<?php
	Models::Load( "AccountLogin" );

	if( isset($_POST["a"]) ){
		$Account = $_POST["a"];
	}
	if( !AccountValidation( $Account ) ){
		Util::Status(false, "Account is illegal"); 
		exit;
	}

	//check password
	if ( isset($_POST["p"]) ){
		$Password = $_POST["p"];	
	}
	if( !AccountValidation($Password) ){
		Util::Status(false, "illegal"); 
		exit;
	}

	//check email
	if ( isset($_POST["m"]) ){
		$Email = $_POST["m"];	
	}
	if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
		Util::Status(false, "Invalid email format"); 
		exit;
	}


	if ( !AccountExist($Account) ){
		CreatNewAccount( $Account, $Password, $Email );
		Util::Status(true, "Creat New Account");
	}
	else{
		Util::Status(false, "Account Exist-");
 	}
