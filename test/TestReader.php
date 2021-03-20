<?php
namespace test;

use \PHPUnit\Framework\TestCase;
use \Database\Actions\Reader;

class TestReader extends TestCase
{
    public function testAttributeConnection()
    {
        $this->assertClassHasAttribute("connection", Reader::class);
    }

    public function testMethodSelect()
    {
        $object = new Reader;
        $result = $object->select();
        $name = current($result)->name;//get the name of first item
        $this->assertSame($name, "camisa");//assert if is equal to "camisa"
    }

    public function testMethodSelectOnly()
    {
        $object = new Reader;
        $result = $object->SelectOnly(1);
        
        $name = $result[0]->name;//get the name of the only item
        $this->assertSame($name, "camisa");//assert if is equal to "camisa"

    }
}