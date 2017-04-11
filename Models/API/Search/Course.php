<?php

class Search {

	public static function GetSuggest( $Query ) {
		return Search::Query( $Query, 0, 5 );
	}

	public static function GetAllResult( $Query, $index = 0) {
		return Search::Query( $Query, $index*30 );
	}

	
	public static function Query( $Query, $Start = 0, $Limit = 30 ) {
		$Section = " ";
		$OtherOpts = " ";
		if( mb_strpos( $Query , "日間部") !== false ){
			$Query = str_replace("日間部", "", $Query);
			$Section = " AND `CID` LIKE 'D%' ";
		} else if( mb_strpos( $Query , "日間") !== false ){
			$Query = str_replace("日間", "", $Query);
			$Section = " AND `CID` LIKE 'D%' ";
		} else if ( mb_strpos( $Query , "夜間部") !== false ){
			$Query = str_replace("夜間部", "", $Query);
			$Section = " AND `CID` LIKE 'C%' ";
		} else if ( mb_strpos( $Query , "夜間") !== false ){
			$Query = str_replace("夜間", "", $Query);
			$Section = " AND `CID` LIKE 'C%' ";
		} else if ( mb_strpos( $Query , "進修部") !== false ){
			$Query = str_replace("進修部", "", $Query);
			$Section = " AND `CID` LIKE 'C%' ";
		} else if ( mb_strpos( $Query , "二技") !== false ){
			$Query = str_replace("二技", "", $Query);
			$Section = " AND `CID` LIKE 'T%' ";
		} else if ( mb_strpos( $Query , "二年制") !== false ){
			$Query = str_replace("二年制", "", $Query);
			$Section = " AND `CID` LIKE 'T%' ";
		} else if ( mb_strpos( $Query , "研究所") !== false ){
			$Query = str_replace("研究所", "", $Query);
			$Section = " AND `CID` LIKE 'G%' ";
		}

		if( mb_strpos( $Query , "選修") !== false ){
			$Query = str_replace("選修", "", $Query);
			$Section .= " AND `CSelectType` = '選' ";
		}else if( mb_strpos( $Query , "必修") !== false ){
			$Query = str_replace("必修", "", $Query);
			$Section .= " AND `CSelectType` = '必' ";
		}else if( mb_strpos( $Query , "通識") !== false ){
			$Query = str_replace("通識", "", $Query);
			$Section .= " AND `CSelectType` = '通' ";
		}
		
		// Add option Week
		$Week = '';
		$DMapping = array(
			"早八" => "D1",
			"早九" => "D2",
			"早十" => "D3"
		);
		$Query = str_replace_assoc ( $DMapping, $Query); 
		if( mb_strpos( $Query , "星期") !== false || mb_strpos( $Query , "週") !== false){
			preg_match_all("/(星期|週)(一|二|三|四|五|六|日|天)/", $Query, $Week);
			if( count( $Week ) > 2 ){
				$tmpWeek = null;$tmp = '';
				foreach ( $Week[2] as $weekOpts ){
					$tmpWeek[$weekOpts] = 1;
		    		$Query = str_replace("星期$weekOpts", "", $Query);
		    		$Query = str_replace("週$weekOpts", "", $Query);
				}
				foreach ( $tmpWeek as $key => $val ){
					$tmp .= "%$key";
				}	
				$OtherOpts = "&& CONCAT_WS( ' ',  `CWeek1` , `CWeek2`, `CWeek3`,  `CWeek2`, `CWeek1` ) LIKE \"{$tmp}%\"";
			}
			$Week = '';	
		}
		$SQL =
		"	SELECT  `Dept`,`CID`,`CName`,`CProf`, `CPoint`
			FROM 	fju_1052
			WHERE 	CONCAT(
				CONCAT_WS(' ', `CID`, `Dept`, `CName`, `CNameE`, `CProf`, `CTime1`, `CTime2`, `CTime3`, `CRoom1` ,  `CRoom2` ,  `CRoom3`  ),' '
				,CONCAT_WS(' ', `CID`, `Dept`, `CName`, `CNameE`, `CProf`, `CTime1`, `CTime2`, `CTime3`, `CRoom1` ,  `CRoom2` ,  `CRoom3` )
			)
			LIKE  '%".($Query)."%'
			{$OtherOpts}
			{$Section}
			LIMIT {$Start} , {$Limit}
		";
		$Result = DB::Query( $SQL );
		$Data = array();
		while( $Fetch = $Result->fetch(PDO::FETCH_ASSOC) ){

			switch ( substr($Fetch["CID"], 0, 1) ) {
				case 'C':
					$Fetch["Section"] = "進修部";
					break;
				case 'D':
					$Fetch["Section"] = "日間部";
					break;
				case 'G':
					$Fetch["Section"] = "研究所";
					break;
				case 'T':
					$Fetch["Section"] = "二年制";
					break;
			}

			$Data[] = array(
				"id" 	=> $Fetch["CID"],
				"name" 	=> $Fetch["CName"],
				"dep" 	=> $Fetch["Dept"],
				"prof" 	=> $Fetch["CProf"],
				"sect"	=> $Fetch["Section"],
				"point" => $Fetch["CPoint"],				
			);

		} // end of while

		return  $Data;
	}
}

function str_replace_assoc( $replace, $subject) { 
   return str_replace(array_keys($replace), array_values($replace), $subject);    
}
