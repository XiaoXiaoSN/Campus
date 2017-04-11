<?php
	class get_timetable {
		public static function dept_timetable( $dept, $year = "", $class = "" ){
			$search = "%{$dept}{$year}{$class}%";
			$SQL ="
				SELECT CName,CRoom1 FROM `fju_1052` 
				WHERE `Dept` LIKE  '{$search}'
					AND `CSelectType` = '必'
			";

			$Result = DB::Query( $SQL );
			$Data = array();
			while( $Fetch = $Result->fetch(PDO::FETCH_ASSOC) ){
				$Data[] = $Fetch ;
			}
			$Data = $Data?$Data:false;
			return  $Data;	
		}
	}

	function GetUserTimeTable ( $UID ){
		$SQL = "
			SELECT `courseID` FROM `TimeTable` 
			WHERE `accountID` = '{$UID}' AND `visible` = 1
		";

		$Result = DB::Query( $SQL );
		$Data = array();
		while( $Fetch = $Result->fetch(PDO::FETCH_ASSOC) ){
			$Data[] = $Fetch ;
		}
		$Data = $Data?$Data:false;
		return  $Data;

	}

