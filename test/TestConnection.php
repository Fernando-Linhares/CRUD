<?php
namespace test;

use \PHPUnit\Framework\TestCase;
use \Database\Connection\MysqlConnection;
use \PDO;

class TestConnection extends TestCase
{
    public function testInstance()
    {
        $connection = new  MysqlConnection;

        $instance = $connection->getInstance();

        $this->assertInstanceOf(\PDO::class, $instance);
    }

    /**
     * @depends testInstance
     */
    public function testConnection()
    {
        $connection = new MysqlConnection;

        $statement = $connection
        ->getInstance()
        ->query("SHOW TABLES");
        $result = $statement->execute();
        
        $this->assertTrue($result);
    }
}