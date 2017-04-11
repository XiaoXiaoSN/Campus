<?php
	
	function getCommit( $CID, $index ){

		$SQL = "
			SELECT `accountID`, `star`, `commit`, `CreatTime`
			FROM `CourseStar` 
			WHERE courseID = '{$CID}' AND Visible = 1
			ORDER BY `CreatTime` ASC 
			LIMIT {$index}, 5
		";

		$Result = DB::Query( $SQL );
		$Data = array();
		while( $Fetch = $Result->fetch(PDO::FETCH_ASSOC) ){
			$Data[] = array(
				"id" 		=> $Fetch["accountID"],
				"star" 		=> $Fetch["star"],
				"content" 	=> $Fetch["commit"],
				"time" 		=> $Fetch["CreatTime"]			
			);
		}
		$Data = $Data?$Data:false;

		if($Data == false){

			Util::Status(false,"no any commit");
			return false;
		}

		$SQL = "
			SELECT AVG( star ) as avg_star
			FROM `CourseStar` 
			WHERE courseID = '{$CID}' AND Visible = 1
		";
		$Result = DB::Query( $SQL )->fetch(PDO::FETCH_ASSOC);
		$AVG = $Result['avg_star']?$Result['avg_star']:false;

		return array(
			"Result" => $Data,
			"AVG"	=> $AVG
		);
	}