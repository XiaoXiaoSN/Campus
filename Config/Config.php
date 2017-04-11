<?php
	
	/* |=================================================|
	 * |					Debug Mode 					 |
	 * |=================================================|
	 * 
	 * To enable debug mode ( Development Mode):
	 * define( Debug, true );
	 * 
	 * Debug Mode will output detail error message
	 * Strongly recommend you DO NOT enable debug mode
	 * when your website is online .
	 * 
	 */
	define( "_PURE_DEBUG_", true );


	/* |=================================================|
	 * |					Force HTTPS 					 |
	 * |=================================================|
	 * 
	 * To enable Force HTTPS 
	 * define( "force_https", true );
	 * 
	 * 
	 */
	define( "force_https", false );



	/* |=================================================|
	 * |				MySQL Database					 |
	 * |=================================================|
	 *
	 *	Config your database settings
	 *
	 *	host 			: _db_host_ 
	 *  db name 		: _db_name_ 
	 *  db user 		: _db_user_ 
	 *  db password  	: _db_pass_ 
	 *  return encoding : _db_encoding_ 
	 * 
	 * 
	 */ 
	//define(	"_db_host_", 		);
	define(	"_db_host_", 	    	);
	define(	"_db_user_", 			);
	define(	"_db_pass_", 		 );
	define(	"_db_name_", 			);
	define(	"_db_encoding_", 	"utf8"	);


	/* |=================================================|
	 * |					Session						 |
	 * |=================================================|
	 *
	 *	Config Session Settings
	 * 
	 */
	define(	"_session_name_", 	"Tenoz"	);
	define(	"_session_domain_", ".tenoz.asia"	);
	


	/* |=================================================|
	 * |					MISC 	 					 |
	 * |=================================================|
	 * 
	 *	When caught exceptions, php will interupt and clean buffer output
	 * 	If you want to ignore exceptions, then disable _interupt_when_error_
 	 *
 	 */

	define( "_interupt_when_error_" , true);
	define( "site_icon" , "/Resource/image/favicon.png");
	date_default_timezone_set("Asia/Taipei");

	/* |=================================================|
	 * |					OAuth 	 					 |
	 * |=================================================|
	 * 
	 *	
 	 *
 	 */
	// Tenoz
	$_CONFIGS["TenozOAuth-ClientID"] = "8516974398";
	$_CONFIGS["TenozOAuth-ClientSecret"] = "24f9ad5b73f117f5e3716a8b396febacf4811dd0";
	$_CONFIGS["TenozOAuth-RedirectUri"] = "http://rhythm.tenoz.asia/oauth/redirect";
	$_CONFIGS["TenozOAuth-ResoucreEndpoint"] = "http://oauth.tenoz.asia/resource";
	$_CONFIGS["TenozOAuth-TokenEndpoint"] = "http://oauth.tenoz.asia/token";
	$GLOBALS["_CONFIGS"] = $_CONFIGS;



	if( !_PURE_DEBUG_ )
		error_reporting(0);
	ob_start();
