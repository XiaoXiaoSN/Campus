<?php
ini_set("session.name", _session_name_);
/*
ini_set("session.use_cookies", 1);
ini_set("session.use_only_cookies", 1);
ini_set("session.cookie_httponly", 1);
ini_set("session.use_trans_sid", 0);
ini_set('session.cookie_domain', _session_domain_ );


setcookie(
		_session_name_,
		$_COOKIE[_session_name_],
		time() + 2*7*24*60*60,
		'/',
		_session_domain_,
		true,
		true
	);

session_start( @$_COOKIE[_session_name_] );

*/
session_start();
