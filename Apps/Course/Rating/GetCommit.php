<?php
	Models::Load("Course/Commit");
	
	if( isset($_POST["CID"]) && isset($_POST['index'])){
		$CID 	= $_POST["CID"];
		$index 	= $_POST["index"];
	}else{
		Util::Status(false, "no~~"); 
	}


	$Data = json_encode( getCommit($CID, $index) );
	Util::Status(True, $Data); 