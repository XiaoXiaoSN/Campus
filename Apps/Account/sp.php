<?php
	Models::Load( "AccountLogin" );

	//check account token
	if(isset($_POST["tk"]) && isset($_SESSION["SignIn"])){
		if( $_POST["tk"] !== $_SESSION["SignIn"]["Token"] ){
			Util::Status(false, "bad token");
		}
	}else{
		Util::Status403("Missing Content");
	}

	//check password
	if ( isset($_POST["pw"]) ){
		$Password = $_POST["pw"];
	}
	if( !AccountValidation($Password) ){
		Util::Status(false, "illegal"); 
		exit;
	}

	//login
	if( $Result = login( $_SESSION["SignIn"]["Account"], $Password) ){
		unset($_SESSION["SignIn"]);
		$_SESSION["Tenoz"]["Logon"] = true;
		$_SESSION["User"]["Account"]	= $Result["_tenoz_Account"];
		$_SESSION["User"]["UID"]		= $Result["_tenoz_AccID"];
		$_SESSION["User"]["Name"]		= $Result["_tenoz_usrName"];
		$_SESSION["User"]["Admin"]		= $Result["Permission"];
		$_SESSION["User"]["MainEmail"]	= $Result["_tenoz_MainEmail"];	
		//$_SESSION["User"]["SubEmail"]	= $Result["_tenoz_SecEmail"];

		Util::StatusTrue("Now log in : ".$Result["_tenoz_Account"]);
	}
