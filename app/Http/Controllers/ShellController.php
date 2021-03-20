<?php
namespace Http\Controllers;

use \Database\Models\Products;
/**
 * this Controller is low level
 * but only for do the app on shell
 * of crud
 */
class ShellController
{
    //show all products on shell
	public static function index(): void
	{
        $products = new Products;
        foreach($products->all() as $product){
            echo "id: ".$product->id." - ";
            echo "name: ".$product->name." - ";
            echo "price: ".$product->price." - ";
            echo "categorie: ".$product->cat;
            echo "\n";
        }
	}
    //delete the product
    public static function delete(): void
    {
        echo "\nprick the id product\n";
        $input = readline();
        $products = new Products;
        $products->destroy($input);

        foreach($products->all() as $product){
            echo "id: ".$product->id." - ";
            echo "name: ".$product->name." - ";
            echo "price: ".$product->price." - ";
            echo "categorie: ".$product->cat;
            echo "\n";
        }
    }
    //create an product on shell
    public static function create(): void
    {
        echo "\ncreate a new product\n";

        echo "name:\n";
        $name = readline();
        echo "\nprice:\n";
        $price = readline();
        echo "\ncategorie:\n";
        $cat = readline();


        $products = new Products;
        $products->insert(
            id:null,
            name:$name,
            price:$price,
            cat:$cat
        );

        foreach($products->all() as $product){
            echo "id: ".$product->id." - ";
            echo "name: ".$product->name." - ";
            echo "price: ".$product->price." - ";
            echo "categorie: ".$product->cat;
            echo "\n";
        }
    }
    //change the product on shell
    public static function update(): void
    {
        echo "\nchange an product\n";
        echo "id:\n";
        $id = readline();
        echo "\ncollum:\n";
        $key = readline();
        echo "\nvalue:\n";
        $value = readline();


        $products = new Products;
        $products->update(
            id:$id,
            key:$key,
            value:$value
        );

        foreach($products->all() as $product){
            echo "id: ".$product->id." - ";
            echo "name: ".$product->name." - ";
            echo "price: ".$product->price." - ";
            echo "categorie: ".$product->cat;
            echo "\n";
        }
    }

    //migrate the file to the database
    public static function migrate(string $file)
    {

        //function gerator for got all procuts on file
        $gerator = function () use ($file){
            $stream = fopen($file, "r");
                while(!feof($stream)){
                    yield fgets($stream);
                }
            fclose($stream);
        };

        //function to filter all data of a line on stream
        $filter = function($data,$input){

            $lines = explode("-",$input);
            $pattern = "/".$data.":[a-z0-9]+/i";

            foreach($lines as $line){
                if(preg_match($pattern,$line,$result)){
                    $res = explode(":",current($result));
                    $content= next($res);
                }
            }
            return $content;
        };
        //the interator get all that on stream line to line
        $interator = $gerator();
        $products = new Products;
        //the looping that insert to database all data of interator
        foreach($interator as $value){
            if(preg_match("/[\-]+/",$value))
                    continue;
                else{

                    $products->insert(
                        id:null,
                        name:$filter("name",$value),
                        price:(float)$filter("price",$value),
                        cat:$filter("cat",$value)
                    );
            }
        }
       
        //test if have a product show the massage
        if($products->count()>0){
            echo "\nloading\n";
            for($i=0;$i>5;$i++){
                echo ".";
                sleep(1);
            }
            echo "\nfile migrated sucessfuly\n";
        }else{
            echo "\nError on submit file";
        }
    }
}
