<?php
namespace Database\Models;

/**
 * model class Products 
 * responsible for do operations
 * create, update ,delete and read
 * using the entitys responsibles
 * for each this function.
 * 
 * This model is the layer hight level
 * for this app, using abstractions of
 * entitys.
 */
use Database\Actions\Creator;
use Database\Actions\Reader;
use Database\Actions\Updator;
use Database\Actions\Deleter;
use Database\Connection\MysqlConnection;

class Products
{
    //entitys using
    private Reader $reader;
    private Creator $creator;
    private Deleter $deleter;
    private Updator $updator;

    public function __construct(
        private int|null $id=null,
        private string|null $name=null,
        private float|null $price=null,
        private string|null $cat=null,
        )
    {
        $this->reader = new Reader(new MysqlConnection);
        $this->creator = new Creator(new MysqlConnection);
        $this->deleter = new Deleter(new MysqlConnection);
        $this->updator = new Updator(new MysqlConnection);
    }
    
    public function count(): int
    {
        return count($this->reader->select());
    }

    //return all data and all intens
    public function all(): object
    {
       return (object) $this->reader->select();
    }

    //return only a item data
    public function getonly(int $id)
    {
        return (object) $this->reader->selectOnly($id);
    }

    //save your changes on instance  
    public function save(): bool
    {
        $this->updator->change(
            id:$this->id,
            key:"name",
            value:$this->name
        );

        $this->updator->change(
            id:$this->id,
            key:"price",
            value:$this->price
        );

        $this->updator->change(
            id:$this->id,
            key:"cat",
            value:$this->cat
        );

        return true;
    }

    //update the item
    public function update(int $id,string $key,int|float|string $value): bool
    {
        $this->updator->change(
            id:$id,
            key:$key,
            value:$value
        );
        return true;
    }

    //insert the data on database
    public function insert(
        int|null $id=null, string $name=null,
        int|float $price=null, string $cat=null
        ): bool
    {
        if(
            empty($this->id) && empty($this->name) && 
            empty($this->price) && empty($this->cat)
            ){
            $this->creator->create(
                id:$id,
                name:$name,
                price:$price,
                cat:$cat
            );
        }elseif(
            empty($this->id) or empty($this->name) or 
            empty($this->price) or empty($this->cat)
        ){
            throw new \Exception("Error on create item an value is void");
        }else{
            $this->creator->create(
                id:$this->id,
                name:$this->name,
                price:$this->price,
                cat:$this->cat
            );
        }
        return true;
    }

    //delete the item
    public function destroy($id): bool
    {
        if(empty($this->id))
            $this->deleter->destroy($id);
        else
            $this->deleter->destroy($this->id);
    
        return true;
    }
}
