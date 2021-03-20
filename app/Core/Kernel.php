<?php
namespace Core;

use \Http\Router\Loader;

class Kernel
{
	//the router class

	private Loader $router;

	public function __construct()
	{
		$this->router = new Loader;
	}

	public function start(): void
	{
		//action of load all routes
		$this->router->load();
	}
}