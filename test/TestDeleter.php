<?php
namespace test;

use PHPUnit\Framework\TestCase;
use Database\Connection\MysqlConnection;
use Database\Actions\Deleter;

class TestDeleter extends TestCase
{
    public function testDestroyMethod()
    {
        $deleter = new Deleter(new MysqlConnection);
        $delete = $deleter->destroy(3);
        $this->assertTrue($delete);
    }
}