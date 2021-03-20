<?php
namespace src;
/**
 * To dont give password and usersnames on code
 * this class tranport data of file .env to
 * Class Connection
 * 
 * using disign patter singleton to giv the data
 * just single time
 */
class Dotenv
{
	private static $instance;
	
	public static function getInstance()
	{
		if(empty(self::$instance)){

			//function that filter data on stream
			function getdotenv($value){
				$pattern = "/".$value.":[a-z0-9.@\-\_]+/i";
				$file = file_get_contents("../.env");

				if(preg_match($pattern,$file, $res))
					$result = $res[0];
				else
					$result = "";

				return str_replace("$value:","",$result);
			}
			//set the data to $instance attribute
			self::$instance = (object)[
				'host'=>getdotenv("host"),
				'user'=>getdotenv("user"),
				'password'=>getdotenv("password"),
				'db'=>getdotenv("db"),
			];
		}

		//attribute $instance that have the object with data
		return self::$instance;
	}

	private function __construct(){}
	private function __clone(){}
}