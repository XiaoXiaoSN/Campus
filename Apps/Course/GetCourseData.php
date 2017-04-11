<?php
	Models::Load( "Course/GetCourseData" );
	$Course = new Course();
	$GLOBALS["Course"] = $Course;
	if( file_exists("Apps/Course/Course.php") ){ 	
		Apps::run( "Course/Course" );
	} else {
	}
