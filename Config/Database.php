<?php
class DB {
	static private $canRun  = 	-1;
	static private $_DBHOST =	_db_host_;
	static private $_DBNAME =	_db_name_;
	static private $_DBUSER =	_db_user_;
	static private $_DBPASS =	_db_pass_;
	static private $_DBENCO =	_db_encoding_;

	static private $_RESULT = "";
	static private $_ARRAY = "";

	public static function ConfigsVerify(){

		if ( is_null(self::$_DBHOST) || self::$_DBHOST == "" ){
			self::$canRun = 0;
			throw new DatabaseConfigNotCorrect("Connection needs host, please define it in Config/Config.php");
		}
		if ( is_null(self::$_DBNAME) || self::$_DBNAME == "" ){
			self::$canRun = 0;
			throw new DatabaseConfigNotCorrect("Query needs database's name, please define it in Config/Config.php");
		}
		if ( is_null(self::$_DBUSER) || self::$_DBUSER == "" ){
			self::$canRun = 0;
			throw new DatabaseConfigNotCorrect("Connection needs a user, please define it in Config/Config.php");
		}

		if(is_null(self::$_DBENCO) || self::$_DBENCO == "" ){
			self::$_DBENCO =	"UTF8";
		}
		self::$canRun = 1;
	}

	public static function EstablishConnection(){
		if( self::$canRun == 0 ){
			return;
		} elseif ( self::$canRun == -1 ) {
			try{
				self::ConfigsVerify();
			} catch (DatabaseConfigNotCorrect $ex){
				if( _PURE_DEBUG_ ){
					if( _interupt_when_error_ ){
						ob_end_clean();
						echo $ex->getMessage();
						exit;
					} else {
						echo $ex->getMessage();
					}
				}
			}
		}

		$DSN = 
			 "mysql:"
			."host="	._db_host_.	";"
			."dbname="	._db_name_. ";"
			."charset=" .self::$_DBENCO. ";";
        if( strpos(_db_host_, ":") ){
            $DSN = 
		    	 "mysql:"
			    ."host="	.(explode(":",_db_host_)[0]).	";"
			    ."port="	.(explode(":",_db_host_)[1]).	";"
    			."dbname="	._db_name_. ";"
	    		."charset=" .self::$_DBENCO. ";";
        }
		try {
			
			if(@ $Connect 	= new PDO ( $DSN, _db_user_, _db_pass_ ))
				return $Connect;
		} catch (PDOException $e) {
			throw new DatabaseConnectionException($e->getMessage());
		}

	}
	private static function StoreData($Data){
		self::$_ARRAY 	= "";
		self::$_RESULT 	= $Data;
	}

	public static function Query( $SQL ){
		
		try{
			$Connect 	= self::EstablishConnection();
			$Result 	= $Connect-> query($SQL);
			if( !$Result && $Connect-> errorInfo() ){	
				throw new DatabaseQueryReturnException( $Connect-> errorInfo() );
			}
		
			self::$_RESULT = $Result;
			return self::$_RESULT;
		} catch ( DatabaseConnectionException $ex ){
			$ex ->DumpError();
			return false;
		} catch ( DatabaseQueryReturnException $ex ){
			$ex ->DumpError();
			return false;
		} catch ( DatabaseConfigNotCorrect $ex){
			$ex ->DumpError();
			return false;
		}
	}
	public static function Prepare( $SQL ){
   		$db = new PDO('mysql:host='._db_host_.';dbname='._db_name_.';'."charset=" .self::$_DBENCO, _db_user_, _db_pass_);
   		$stmt = $db->prepare( $SQL );
   		$stmt ->execute();
   		return $db;
	}
	public static function GetRowCount( ){
		self::ConfigsVerify();
		return self::$_RESULT->rowCount();
	}
	public static function isNull() {
		self::ConfigsVerify();
		return (self::$_RESULT->rowCount() == 0);
	}
	public static function ToArray( $Callback=null ){
		self::ConfigsVerify();

		if( is_array( self::$_ARRAY ) ){
			return self::$_ARRAY;
		}
		while( $FETCH_ASSOC = self::$_RESULT -> fetch(PDO::FETCH_ASSOC) ){
			$FETCH[] = $FETCH_ASSOC;
		}
		self::$_ARRAY = $FETCH;
		if( $Callback == null ){
			return $FETCH;
		} else {
			call_user_func( $Callback, $FETCH );
		}
	}
}


class DatabaseException extends Exception {


	public function __construct( $msg, $code = 0, Exception $previous = null ){
		parent::__construct( $msg, $code, $previous );
	}
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    public function DumpError(){
		Util::Debug(
			"Database",
				"/Config/Database.php",
				array(
					"DebugEnabled" =>
						"<h2>".$this->message."</h2>",
					"DebugDisabled" =>
						"An error is occurred ."
				),
				true,	//Clean Screen
				true 	//php OFF
		);
    }
}

class DatabaseConfigNotCorrect extends DatabaseException {

	public function __construct( $msg = null, $code = 0, Exception $previous = null ){
		if( _PURE_DEBUG_ ){
			parent::__construct( $msg, $code, $previous );
		} else {
			parent::__construct( "The configuration is not properly set .", 0, null );
		}
	}

}
class DatabaseQueryReturnException extends DatabaseException {

	public function __construct( $error_obj, $msg = null, $code = 0, Exception $previous = null ){
		
		if( _PURE_DEBUG_ ){
			if( is_null($msg) ){
				$msg = "DatabaseQueryReturnException : $error_obj[0] \n$error_obj[2]";
			}
			parent::__construct( $msg, $code, $previous );
		} else {
			parent::__construct( "An error occurred while loading database content .", 0, null );
		}

	}

}

class DatabaseConnectionException extends DatabaseException {
	public function __construct( $msg, $code = 0, Exception $previous = null ){
		if( _PURE_DEBUG_ ){
			parent::__construct( $msg, $code, $previous );
		} else {
			parent::__construct( "An error occurred while connectioning database .", 0, null );
		}
	}
}