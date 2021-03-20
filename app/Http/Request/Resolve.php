<?php
namespace Http\Request;

class Resolve
{
		//method that trate the header
	public function on(string $route): Executor
	{
		/**
		 * the header is got for super global $_SERVER["REQUEST_URI"]
		 * and if parm $route is equal the class Executor must to be called
		 * whit value bool true else value false 
		 * 
		 * nothing complex, just to make a flow on the app
		 * that do call the controller method to do the operations
		 */
		if($_SERVER['REQUEST_URI'] == $route){
			return new Executor(true);
		}else{
			return new Executor(false);
		}
	}
}