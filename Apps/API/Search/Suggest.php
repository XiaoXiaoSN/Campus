<?php

	Models::Load("API/Search/Course");
	$Search = htmlentities(strip_tags($_POST["search"]));

	$_POST["search"] = str_replace(array("'", '"', '\\', '/'),"", trim($_POST["search"]) );

	if( mb_strlen( $_POST["search"], "UTF-8" ) <= 0 ){
		Util::Status403("Missing Content");
	}

	
	if( strpos( $Search, " " ) !== -1 ){
		$Search = preg_split("/[\s]+/", $Search);//one or more space
		$Search = implode("%", $Search);
	}


	Util::StatusTrue(
		Search::GetSuggest( $Search )
	);
	
	