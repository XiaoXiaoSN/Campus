<?php

class Util extends Core {

	public static function GetIP(){
		$client  = @$_SERVER['HTTP_CLIENT_IP'];
		$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		$remote  = $_SERVER['REMOTE_ADDR'];

		if ( filter_var($client, FILTER_VALIDATE_IP) ){
			$ip = $client;
		} elseif ( filter_var($forward, FILTER_VALIDATE_IP) ){
			$ip = $forward;
		} else {
			$ip = $remote;
		}
		$return = explode(":", $ip);
		return  $return[0];
	}

	public static function HTMLnl2br( $str ){
		return nl2br(XSS(strip_tags( $str )));
	}

	public static function Status( $status = true, $results = null ){
		header("Content-Type: application/json; charset=UTF-8");
		if( is_string( $results ) || is_numeric( $results ) || is_bool( $results ) ){
			$result = array( "status"=> $status, "results" => $results );
		} else if( is_array( $results ) ){
			$result = array( "status"=> $status, "results" => $results );
			echo json_encode( $result , JSON_FORCE_OBJECT );
			exit;
		} else {
			$result = array( "status"=> $status );
		}
		echo json_encode( $result );
		exit;	
	}

	public static function StatusTrue( $results = null ){
		self::Status( true, $results );
	}

	public static function StatusFalse( $results = null ){
		self::Status( false, $results );
	}

	static function Status400( $msg = "Bad Request" ){
        self::StatusFailCode( 400, $msg );
	}

	public static function Status403( $msg = "Your request has been denied." ){
        self::StatusFailCode( 403, $msg );
	}

	public static function Status404( $msg = "Resource Unreachable ." ){
        self::StatusFailCode( 404, $msg );
	}

	public static function StatusFailCode( $type = 500, $msg = "Error occurred" ){
        header("HTTP/1.1 {$type}  {$msg}");
        header("Content-Type: application/json; charset=UTF-8");
        self::StatusFalse( );
	}

	public static function ToObject(Array $arr) {
	    $obj = new stdClass();
	    foreach($arr as $key=>$val) {
	        if (is_array($val)) {
	            $val = self::ToObject($val);
	        }
	        $obj->$key = $val;
	    }

	    return $obj;
	}

	public static function AutoLink( $text ){
	    $regex = '#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#';
	    return preg_replace_callback($regex, function ($matches) {
	        return "<a href=\'{$matches[0]}\'>{$matches[0]}</a>";
	    }, $text);
	}



	/*
	* XSS filter 
	*
	* This was built from numerous sources
	* (thanks all, sorry I didn't track to credit you)
	* 
	* It was tested against *most* exploits here: http://ha.ckers.org/xss.html
	* WARNING: Some weren't tested!!!
	* Those include the Actionscript and SSI samples, or any newer than Jan 2011
	*
	*
	* TO-DO: compare to SymphonyCMS filter:
	* https://github.com/symphonycms/xssfilter/blob/master/extension.driver.php
	* (Symphony's is probably faster than my hack)
	*/
	function XSS($data, $type=null) {
	    // Fix &entity\n;
	    $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
	    $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
	    $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
	    $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

	    // Remove any attribute starting with "on" or xmlns
	    $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

	    // Remove javascript: and vbscript: protocols
	    $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
	    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
	    $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

	    // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
	    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
	    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
	    $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

	    // Remove namespaced elements (we do not need them)
	    $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

	    do
	    {
	            // Remove really unwanted tags
	            $old_data = $data;
	            $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
	    }
	    while ($old_data !== $data);

	    if($type==1){

	            return mb_ereg_replace('([_%#])', '', $data);
	    }

	    // we are done...
	    return $data;
	}
}