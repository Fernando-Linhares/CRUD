<?php
namespace test;

use \PHPUnit\Framework\TestCase;
use \src\Dotenv;

class TestDotenv extends TestCase
{
    public function testStaticInstaceAttribute()
    {
        $this->assertClassHasStaticAttribute("instance", Dotenv::class);
    }

    public function testInstanceMethodHost()
    {
        $data = Dotenv::getInstance();

        $this->assertObjectHasAttribute("host", $data);
    }
    /**
     * @depends testInstanceMethodHost
     */
    public function testInstanceMethodDB()
    {
        $data = Dotenv::getInstance();

        $this->assertObjectHasAttribute("db", $data);
    }
    /**
     * @depends testInstanceMethodDB
     */
    public function testInstanceMethodUser()
    {
        $data = Dotenv::getInstance();

        $this->assertObjectHasAttribute("user", $data);
    }
    /**
     * @depends testInstanceMethodUser
     */
    public function testInstanceMethodPassword()
    {
        $data = Dotenv::getInstance();

        $this->assertObjectHasAttribute("password", $data);
    }
}