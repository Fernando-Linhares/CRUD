<?php
namespace test;

use Database\Models\Products;
use PHPUnit\Framework\TestCase;

class TestProducts extends TestCase
{
   
    public function getClassProducts(
        int|null $id=null, string $name=null,
        float|int $price=null, string $cat=null
        )
    {
        return new Products(
            id:$id,
            name:$name,
            price:$price,
            cat:$cat
        );
    }

   public function testMethodAll()
    {
        $products= $this->getClassProducts();

        $all = $products->all();

        $this->assertNotEmpty($all);
    }

    public function testMethodDestroy()
    {
        $products = $this->getClassProducts();

        $destroyed = $products->destroy(4);

        $this->assertTrue($destroyed);
    }
    
    public function testMethodUpdate()
    {
        $products = $this->getClassProducts();

        $changed = $products->update(
            id:1,
            key:"name",
            value:"calça"
        );

        $this->assertTrue($changed);
    }

    public function testMethodSave()
    {
        $products = $this->getClassProducts(
            id: 1,name:"camiseta",
            price:19,cat:"nike"
        );
    
        $saved = $products->save();

        $this->assertTrue($saved);
    }

    public function testMethodInsert()
    {
        $products = $this->getClassProducts();
    
        $inserted = $products->insert(
            id: null,name:"moleton",
            price:19,cat:"prada"
        );

        $this->assertTrue($inserted);
    }

    public function testHasAttributeReader()
    {
        $products = $this->getClassProducts();

        $this->assertObjectHasAttribute("reader", $products);
    }

    public function testHasAttributeCreator()
    {
        $products = $this->getClassProducts();

        $this->assertObjectHasAttribute("creator", $products);
    }

    public function testHasAttributeDeleter()
    {
        $products = $this->getClassProducts();

        $this->assertObjectHasAttribute("deleter", $products);
    }

    public function testHasAttributeUpdator()
    {
        $products = $this->getClassProducts();

        $this->assertObjectHasAttribute("updator", $products);
    }

    public function testHasCount()
    {
        $products = $this->getClassProducts();
        
        $count = $products->count();
        if($count>0)
            $expect =true;

        $this->assertTrue($expect);
    }

    public function testMethodGetOnly()
    {
        $products = $this->getClassProducts();
        $count = $products->getonly(1);

        $this->assertNotEmpty($count ,1);
    }
}