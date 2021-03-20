<?php
namespace Http\Router;

use Http\Request\Resolve;

class Loader implements RouterLoaderInterface
{
	private Resolve $route;

	public function __construct()
	{
		//class that load the header
		$this->router = new Resolve;
	}

	//here load all routes
	public function load()
	{
		//routes call a mehod of an controller
		$this->router->on("/")->get("Controller:index");
		$this->router->on("/create")->get("Controller:create");
		$this->router->on("/create/product")->post("Controller:update");
		$this->router->on("/edit")->post("Controller:edit");
		$this->router->on("/edit/product")->post("Controller:change");
		$this->router->on("/delete")->post("Controller:delete");
	}
}