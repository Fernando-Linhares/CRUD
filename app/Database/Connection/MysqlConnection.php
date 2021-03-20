<?php
namespace Database\Connection;

use src\Dotenv;
use PDO;
/**
 * class that connect all app to database
 * using the Class PDO to made the abstration
 * but still is low level scripts
 */
class MysqlConnection
{
	private static $instance;

	private object $data;

	//options of pdo attributs
	private const OPTIONS = [
		PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8",
		PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
		PDO::ATTR_CASE=>PDO::CASE_NATURAL
	];

	public function __construct()
	{
		$this->data = Dotenv::getInstance();
	}

	//get instance pdo using the data on Dotenv
	public function getInstance(): PDO
	{
		if(empty(self::$instance)){
			self::$instance = new PDO(
				"mysql:host=".$this->data->host.";dbname=".$this->data->db,
				$this->data->user,
				$this->data->password,
				self::OPTIONS
			);
		}
		return self::$instance;
	}
}
