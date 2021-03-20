<?php
namespace Database\Actions;

use \Database\Connection\MysqlConnection;

//Entity responsible to delete the itens on project
class Deleter
{
    public function __construct(
        private MysqlConnection $connection
    ){}

    //this method delete an item
    public function destroy(int $id): bool
    {
       $state = $this->connection->getInstance()->prepare(
           "DELETE FROM products WHERE id = :ID"
       );
       $state->bindParam(":ID", $id);
       $state->execute();

       return true;
    }
}