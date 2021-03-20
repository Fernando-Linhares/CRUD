<?php
namespace Http\Controllers;

/**
 *  HttpBase controller is the abstract class
 * for made low leval scripts of the controller
*/
abstract class HttpBaseController
{
        //method view render the view and transport the data
	public function view(string $view, object|array $data)
	{
        
                $path = "../resources/views/".$view.".php";

                if(isset($data))
                        $_GET['data'] = $data;

                require $path;
	}
        //method redirect change the http header
        public function redirect(string $uri)
        {
                header("location:$uri");
        }
}