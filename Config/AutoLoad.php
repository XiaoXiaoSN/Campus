<?php

	require_once( "Config/Config.php" );
	if( force_https && empty($_SERVER['HTTPS']) ){
		header("Location:https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
		exit;
	}
	// require_once( "Config/Exception.php" );
	require_once( "Config/Core.php" );
	require_once( "Config/Utilities.php" );
	require_once( "Config/Router.php" );
	require_once( "Config/Session.php" );
	require_once( "Config/Database.php" );
	require_once( "Config/Pages.php" );
	require_once( "Config/Assets.php" );
	require_once( "Config/Apps.php" );
	require_once( "Config/Models.php" );
	
	require_once( "Config/SiteMap.php" );
	/*
*/