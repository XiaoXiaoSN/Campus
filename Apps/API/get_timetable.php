<?php
	Models::Load("API/get_timetable");
	// Util::StatusTrue( 
	// 	get_timetable::dept_timetable("資工","三") 
	// );
	$output = get_timetable::dept_timetable("資工","三");
	echo str_replace("\\/","/",mb_convert_encoding(preg_replace("/\\\\u([0-9abcdef]{4})/", "&#x$1;", json_encode($output)), 'UTF-8', 'HTML-ENTITIES'));
	exit;