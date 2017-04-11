<?php
	
	Models::Load("API/get_timetable");

	Page::Title("Campus");
	Page::Init(function(){

		Assets::Import("jquery");
		// Assets::Import("materialize");
		Assets::Import("semantic");
		//Assets::Style("/Resource/css/home.css");
		Assets::Style("/Resource/semantic/components/search.min.css");
		Assets::Style("/Resource/css/style.css");
		Assets::Script("/Resource/semantic/components/search.min.js");
		Assets::Script("/Resource/semantic/components/api.min.js");
		Assets::Script("/Resource/js/typed.min.js");
		Assets::Script("/Resource/js/vue.min.js");
		Assets::Style("/Resource/css/timetable.css");
		
		
        Assets::Style("https://unpkg.com/flatpickr/dist/flatpickr.min.css");
        Assets::Script("https://unpkg.com/flatpickr");


	});

	Page::TagOn("body");
	
		if( @$_SESSION["Tenoz"]["Logon"] && $_SESSION["User"] ){
			Page::Item( 
				"Nav/NavbarLogon",
				array( 
					"User" => $_SESSION["User"]["Name"]
				)
			);
		} else {
			Page::HTML( "Nav/Navbar" );
		}
		
		Page::Item( 
			"Profile/Profile",
			array( "timetable" => json_encode(GetUserTimeTable( $_SESSION["User"]["UID"] )) )
		 );
		Assets::Import("search");
		Assets::Script("/Resource/js/home.js");
        Assets::Script("/Resource/js/profile.js");

	Page::TagOff("body");