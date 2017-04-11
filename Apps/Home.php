<?php


	Page::Title("Campus");
	Page::Init(function(){

		Assets::Import("jquery");
		Assets::Import("materialize");
        Assets::Import("semantic");

		Assets::Style("/Resource/css/home.css");
		Assets::Style("/Resource/css/style.css");
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
		Page::HTML( "Home/Home" );
		Page::HTML( "Account/account" );
		
		
		Assets::Import("search");
		Assets::Script("/Resource/js/typed.min.js");
		Assets::Script("/Resource/js/vue.min.js");
		Assets::Script("/Resource/js/home.js");
		Assets::Script("/Resource/js/account.js");


	Page::TagOff("body");