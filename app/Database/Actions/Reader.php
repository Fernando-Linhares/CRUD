<?php
namespace Database\Actions;

//Entity responsible to show data
class Reader
{
    private object $connection;

    public function __construct()
    {
        $this->connection = new \Database\Connection\MysqlConnection;
    }

    //this method show all data for a only item
    public function selectOnly(int $id)
    {
        $result = $this
        ->connection
        ->getInstance()
        ->prepare( "SELECT * FROM products WHERE id=:ID");
        $result->bindParam(":ID",$id);
        $result->execute();

        return $result->fetchAll();
    }

    //this->method show all itens and all data
    public function select(): array
    {
        $query = "SELECT * FROM products";

        $result = $this
        ->connection
        ->getInstance()
        ->prepare("SELECT * FROM products");
        $result->execute();

        return $result->fetchAll();

    }
}