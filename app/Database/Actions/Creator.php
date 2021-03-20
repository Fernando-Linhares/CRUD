<?php
namespace Database\Actions;

use \Database\Connection\MysqlConnection;

//Entity responsible to create Itens for application
class Creator
{
	public function __construct(
		private MysqlConnection $connection
		){}
	
	//this method make an iten
	public function create(int|null $id,string $name, int $price, string $cat): bool
	{
		$state = $this->connection->getInstance()->prepare(
			"INSERT INTO products VALUES (:ID,:NAME,:PRICE,:CAT)"
		);
		$state->bindParam(":ID", $id);
		$state->bindParam(":NAME", $name);
		$state->bindParam(":PRICE", $price);
		$state->bindParam(":CAT", $cat);

		if($state->execute())
			return true;
	}
}