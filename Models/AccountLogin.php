<?php
	
	function AccountExist( $acc ){
		$SQL ="
			SELECT count(*) AS isExist FROM `_tenozAccount` 
			WHERE `_tenoz_Account` = '{$acc}'
		";

		$Result = DB::Query( $SQL )->fetch(PDO::FETCH_ASSOC);

		if ($Result["isExist"] == 1){
			return True;
		}else{
			return FALSE;
		}
	}	

	function Login ( $acc, $pw ){
		$SQL = 
		"	SELECT  `_tenoz_AccID`, `_tenoz_Account`, `_tenoz_usrName`, `_tenoz_MainEmail`, `Permission`, _tenoz_AccPassword
			FROM 	_tenozAccount
		 	WHERE 	_tenoz_Account 		= '{$acc}'
		 	LIMIT 1
		";
		$Result = DB::Query($SQL)->fetch(PDO::FETCH_ASSOC);

		if( !password_verify($pw, $Result["_tenoz_AccPassword"]) ){
			return false;
		}else{
			return $Result;
		}
	}

	function CreatNewAccount( $Account, $Password, $Email ){

		$Password = str_replace("$2y$10$", "$2a$10$", password_hash($Password, PASSWORD_BCRYPT));
		$ID = date("U").sprintf("%07d", rand(0,1000000));
		$SQL = 
		"	INSERT INTO `_tenozAccount`(
				`_tenoz_AccID`,
				`_tenoz_Account`,
				`_tenoz_AccPassword`,
				`_tenoz_MainEmail`
			) VALUES (
				'{$ID}',
				'{$Account}',
				'{$Password}',
				'{$Email}'
			)
		";

		DB::Query($SQL);
	}

	function AccountValidation( $acc ){
		if( trim( htmlentities(strip_tags($acc)) ) !== $acc){
			return false;
		} 
		if( mb_strlen($acc, "UTF-8") < 6 ){
			return false;
		}
		return true;
	}
