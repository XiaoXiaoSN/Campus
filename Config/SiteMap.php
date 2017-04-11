<?php
	// echo "<pre>";
	// var_dump($_SERVER);exit;
	Route::Add("/", function(){
		
		Apps::run( "Home" );
		
	}, "Route" );
	
	Route::Add("/api/search/suggest", function(){
	
		Apps::run("API/Search/Suggest");	
	
	}, "Route" );

    Route::Add("/api/search/all",function(){
    
        Apps::run("API/Search/All");
	
	}, "Route" );

    Route::Add("/api/get_timetable",function(){
    
        Apps::run("API/get_timetable");
	
	}, "Route" );

    Route::Add("/api/getCoursefrTime",function(){
    
        Apps::run("API/get_CoursefrTime");
	
	}, "Route" );

 	Route::Add("/Course(/([A-Z0-9]+))?", function(){
		$_GET["CID"] = Route::GetPath()[1];
		Apps::run( "Course/GetCourseData" );
	}, "Route" )
;	

/***********book*******

	//Route::Add("/book(/([A-Z0-9]+))?", function(){
	// 	$_GET["CID"] =  Route::GetPath()[0];
	// 	Apps::run( "Course/GetCourseData" );

	// }, "Route" );
	
	// Route::Add("/Course(/([0-9]+))?(/([A-Z0-9]+))?", function(){
	// 	print_r($_GET);
	// 	Apps::run( "Course/GetCourseData" );


	// }, "Route" ); 	

	Route::Add("/book", function(){
	
		Apps::run("Book");
	
	}, "Route" );	

	Route::Add("/book/details", function(){
	
		Apps::run("Details");	
	
	}, "Route" );

 	
	Route::Add("/book/depart", function(){
	
		Models::Load( "Book/GetBookData" );

		if( $GetBook = Book::GetBook($_POST["depart"],$_POST["grade"],$_POST["class"]) ){
			Util::StatusTrue( $GetBook );
		} else {
			Util::StatusFailCode( 500 , "Unknow Error" );
		}
		
	}, "Route" );

	Route::Add("/book/books", function(){
	
		Models::Load( "Book/GetBookData" );
		
		if( $GetBook = Book::GetList($_POST["books"]) ){
			Util::StatusTrue( $GetBook );
		} else {
			Util::StatusFailCode( 500 , "Unknow Error" );
		}

		
	}, "Route" );

**********book*************/


	Route::Add("/studentID", function(){

		if ( isset($_SESSION["Tenoz"]["Logon"]) ){
			Apps::run( "Profile/Profile" );
		}else{
			header("Location: /");
			Apps::run( "Home" );
		}
		
	}, "Route" );

    Route::Add("/studentID/homework", function(){
        
        Apps::run( "Profile/Homework" );
        
    }, "Route" );

    Route::Add("/studentID/exam", function(){
        
        Apps::run( "Profile/Exam" );
        
    }, "Route" );


//////////////////////////////////////////////////////////


/***Course Request****/
	
    Route::Add("/Request/course/star", function(){
        
        if ( isset($_SESSION["Tenoz"]["Logon"]) && isset($_SESSION["User"]["UID"]) ){
        	$_POST["UID"] = $_SESSION["User"]["UID"];
       		Apps::run( "Course/Star/submit" );
        }
        
		Util::Status(false, "please login");

    }, "Route" );

    Route::Add("/Request/course/getCommit", function(){
        
        Apps::run( "Course/Star/GetCommit" ); 

    }, "Route" );

/***Course Request****/


	Route::Add("/Request/SignIn/sa", function(){
		
		Apps::run( "Account/sa" );

	}, "Route" );

	Route::Add("/Request/SignIn/sp", function(){
		
		Apps::run( "Account/sp" );


	}, "Route" );

	Route::Add("/Request/Signup/ae", function(){
		
		Apps::run( "Account/AccountExist" );

	}, "Route" );

	Route::Add("/Request/Signup/na", function(){
		
		Apps::run( "Account/NewAccount" );

	}, "Route" );



	Route::Add("/Logout", function(){
		
		unset($_SESSION);
		session_start();
		session_destroy();
		$_SESSION = array();
		if($_SERVER["HTTP_REFERER"])
		Route::Location( $_SERVER["HTTP_REFERER"] );

	}, "Route" );


	Route::Add("/test", function(){
		
		Apps::run( "test" );
		
	}, "Route" );

	Route::Submit( "Route" );
	echo "No Match";
