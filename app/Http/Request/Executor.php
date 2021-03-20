<?php
namespace Http\Request;

/**
 * class that execute the method of controller
 * 
 * nothing complex, just to make a flow on the app
 * that do call the controller method to do the operations
 */
class Executor
{
	private bool $valid;

	public function __construct(bool $valid)
	{
		$this->valid = $valid;
	}

	//method GET from http
	public function get(string $command)
	{
		if($this->valid){
			list($controller, $method)= explode(":",$command);
			$executablecommand = "\$object = new Http\\Controllers\\$controller; \$object->$method();";
			eval($executablecommand);
		}else{
			return;
		}
		
	}

	//method POST from http
	public function post(string $command)
	{
		if($this->valid){
			list($controller, $method)= explode(":",$command);
			$executablecommand = "\$object = new Http\\Controllers\\$controller();";
			$executablecommand .= "\$object->$method((object)\$_POST);";
			eval($executablecommand);
		}else{
			return;
		}
	}
}