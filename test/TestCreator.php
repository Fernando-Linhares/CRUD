<?php
namespace test;

use \PHPUnit\Framework\TestCase;
use \Database\Connection\MysqlConnection;
use \Database\Actions\Creator;

class TestCreator extends TestCase
{
    public function testCreate()
    {
       $creator = new Creator(new MysqlConnection);

       $res = $creator->create(
           id:null,
           name:"camisa",
           price:20,
           cat:"adidas"
       );

       $this->assertTrue($res);
    }

    public function testHasMysqlConnection()
    {
        $creator = new Creator(new MysqlConnection);
        $this->assertObjectHasAttribute("connection", $creator);
    }
}