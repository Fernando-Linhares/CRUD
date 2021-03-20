<?php
namespace Database\Actions;

use \Database\Connection\MysqlConnection;

//Entity responsible to update the data
class Updator
{
    public function __construct(
        private MysqlConnection $connection
    ){}

    public function change(int $id, string $key, int|float|string $value): bool
    {
            $state = $this->connection->getInstance()->prepare(
                "UPDATE products SET {$key} = :VALUE WHERE id = :ID"
            );
            $state->bindParam(":VALUE",$value);
            $state->bindParam(":ID", $id);
            $state->execute();
    
        return true;
    }
}