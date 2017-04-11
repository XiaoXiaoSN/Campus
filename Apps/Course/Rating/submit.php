<?php

	if( isset($_POST["comment"]) && isset($_POST["CID"]) && $_POST['Anon'] ){
		$comment = $_POST["comment"];
		$CID 	= $_POST["CID"];
		$UID 	= $_POST["UID"];
		$Anon	= $_POST['Anon']; 
	}else{
		Util::Status(false, "Error"); 
	}

	$comment = htmlentities(strip_tags($comment));
	if( mb_strlen( trim($comment), "UTF-8" ) <= 0 ){
		Util::Status403("Missing Content");
	}


	$go


	$SQL = "
		INSERT INTO `CourseCmt`(
			`accountID`, 
			`courseID`, 
			`star`, 
			`Comment`,
    		`IP`,
    		`Term`,
			`Visible`
		) VALUES (
			'{$UID}',
			'{$CID}',
			'{$star}',
			'{$comment}',
    		'{$IP}',
    		'{$term}',
			1
		)
	";

	DB::Query( $SQL );

	Util::Status(True, "QQ"); 

	// $Result = DB::Query( $SQL );
	// $Data = array();
	// while( $Fetch = $Result->fetch(PDO::FETCH_ASSOC) ){
	// 	$Data[] = $Fetch ;
	// }
	// $Data = $Data?$Data:false;
	// return  $Data;	