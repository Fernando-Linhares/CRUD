<?php
namespace test;

use \PHPUnit\Framework\TestCase;
use \Database\Connection\MysqlConnection;
use \Database\Actions\Updator;

class TestUpdator extends TestCase
{
    public function testChangeMethod()
    {
        $updator = new Updator(new MysqlConnection);
        $update = $updator->change(
            id:1,
            key:"name",
            value:"calça"
        );

        $this->assertTrue($update);
    }
}