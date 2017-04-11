<?php
class Course {
	public static $_term;
	public static $_id;
	public static $_status;

	public function __construct(){
		
		$this->_status = -1;
		// if( $_GET[2] ){
		// 	$this->_term 	= intval( substr($_GET[0], 0, 4) );
		// 	$this->_id	 	= Util::XSS($_GET[1]);
		// } else {

			$this->_term 	= "1052";
			$this->_id	 	= Util::XSS($_GET["CID"]);
		// }
		$this->fetchData();
	}

	public function fetchData(){

	
		$SQL = 
			"	SELECT *
				FROM 	fju_{$this->_term}
				WHERE 	`CID` = '{$this->_id}'
				LIMIT 1
			";

		$Result = DB::Query( $SQL )->fetch(PDO::FETCH_ASSOC);
		if( $Result ){
			
			foreach ($Result as $key => $value) {
				$this->{"$key"} = $value;
			}
			$this->DataFormate();
			$this->_status = 1;
		} else {
			// echo $SQL;
			// Course Not exist
			exit;
		}
		// $this->dump();

	}

	public function dump(){
		echo "<pre>";
		print_r(get_object_vars($this));
		echo "</pre>";
	}

	public function DataFormate(){

		switch ( substr($this->CID, 0, 1) ) {
			case 'C':
				$this->CSection = "進修部";
				break;
			case 'D':
				$this->CSection = "日間部";
				break;
			case 'G':
				$this->CSection = "研究所";
				break;
			case 'T':
				$this->CSection = "二年制";
				break;
			
		}
		$this->ProfExpert 	= trim($this->ProfExpert);
		$this->Link 		= trim($this->Link);
		$this->MCID 		= trim($this->MCID);
		if( $this->ProfExpert ){
			if(mb_substr($this->ProfExpert, 0,3,"UTF-8") == "專長："){
				$this->ProfExpert = mb_substr($this->ProfExpert, 3, -1, "UTF-8");
			}
			if($this->ProfExpert === "尚未填寫"){
				$this->ProfExpert .= "專長";
			}
		}
		if($this->MCID){
			$this->CID.=" (主課程 {$this->MCID})";
		}
		//$this->CSelectType 	= $this->CSelect;
		$this->CSelectType = (isset($this->CSelect) ? $this->CSelect : false);
		$this->CLanguage 	= $this->CLang;
		$this->CUnit 		= $this->Dept;
		$this->CProfessor	= $this->CProf;
		$this->AllowGrade();
		$this->AllowPeople();



		$this->TimePackage();
		if($this->Link){
			$_POST["Link"] = $this->Link;
		}
	}

	function AllowGrade(){
		$grade 	= array("一","二","三","四","五","六","七");
		$color 	= array("#F53A3A","#FF7A2C","#EDE612","#B2FF37","#37FFAC", "#37A3FF","#CA69FB");
		$this->Priority = mb_substr($this->Rule, 1);
		$this->CourseAllow = array();
		$A = 0;
		for( 	$i  = array_search(mb_substr($this->MinGrade,0,1), $grade);
				$i <= array_search(mb_substr($this->MaxGrade,0,1), $grade);
				$i++){
			if( ++$A > 7){
				return;
			}
			$this->CourseAllow["CourseAllow".$i] = "style=\"background:#56BD58;color:#FFF\"";
		}
	}
	function AllowPeople(){

		$this->InDepart 	= $this->StuNum;
		$this->OutDepart 	= $this->OutStuNum;
		$this->Attributes 	= $this->Attr;
		$this->NoWithdraw 	= $this->NoWithDraw;
	}
	function TimePackage( ){
		if(is_null($this->{"CWeek1"})){
			return;
		}
		for($i = 1; $i <= 3; $i++){
			// if( $this->CWeeks{$i} )
			switch( $this->{"CWeek$i"} ){
				case '一':
					$this->{"CWeekNo$i"} = "1";
					break;
				case '二':
					$this->{"CWeekNo$i"} = "2";
					break;
				case '三':
					$this->{"CWeekNo$i"} = "3";
					break;
				case '四':
					$this->{"CWeekNo$i"} = "4";
					break;
				case '五':
					$this->{"CWeekNo$i"} = "5";
					break;
				case '六':
					$this->{"CWeekNo$i"} = "6";
					break;
				case '日':
					$this->{"CWeekNo$i"} = "7";
					break;
				
			}
		
			// $this->{"room$i"} = $this->{"CRoom$i"};
			// $this->{"time$i"} = explode("-", $this->{"CTime$i"});
			// $this->{"week$i"} = $this->{"CWeekNo$i"};
			// $this->{"monbi$i"} = $this->{"CWType$i"};
			$this->{"room$i"} = (isset($this->{"CRoom$i"}) ? $this->{"CRoom$i"} : false);
			$this->{"time$i"} = (isset($this->{"CTime$i"}) ? explode("-", $this->{"CTime$i"}) : false);
			$this->{"week$i"} = (isset($this->{"CWeekNo$i"}) ? $this->{"CWeekNo$i"} : false);
			$this->{"monbi$i"} = (isset($this->{"CWType$i"}) ? $this->{"CWType$i"} : false);

			$MonBi = $this->{"CWType$i"};
			if( trim($MonBi) != "" ){
				$MonBi = (($MonBi=="全")?"每":$MonBi)."週";
				// if( is_null($this->{"CourseTime"}) ){
				// 	$this->{"CourseTime"}.= ""
				// 	."<thead><tr>"
				// 		."<th>隔週</th>"
				// 		."<th>星期</th>"
				// 		."<th>時間</th>"
				// 		."<th>教室</th>"
				// 	."</tr><thead><tbody>";
				// }
				$this->{"CourseTime"} = (isset($this->{"CourseTime"}) ? $this->{"CourseTime"} : "");
				$this->{"CourseTime"}.= ""
				."<tr style='border:0!important;box-shadow:none!imporant;'>"
					."<td style='border:0!important;box-shadow:none!imporant;'><i class='icon ion-clock'></i>{$MonBi}".$this->{"CWeek$i"}." ".($this->{"CTime$i"})."</td>"
					."<td style='border:0!important;box-shadow:none!imporant;'><i class='icon ion-location'></i>".($this->{"CRoom$i"})."</td>"
				."</tr>";
			
			}
	
			
			unset($this->{"CRoom$i"});
			unset($this->{"CTime$i"});
			unset($this->{"CWeekNo$i"});
			unset($this->{"CWType$i"});
		
		}
		// $this->dump();
	}

}
