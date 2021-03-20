<?php
namespace Http\Controllers;

use \Database\Models\Products;

class Controller extends HttpBaseController
{
	//class model products
	private Products $products;

	public function __construct()
	{
		$this->products = new Products;
	}

	//homepage render here
	public function index()
	{
		$data = $this->products->all();
		return $this->view(view:"homepage", data:$data);
	}

	//render the form view
	public function create()
	{
		return $this->view(view:"form", data:[]);
	}

	//insert the data of form on database
	public function update(object $data)
	{
		$this->products->insert(
			id:null,
			name:$data->name,
			price:(float)$data->price,
			cat:$data->cat
		);
		return $this->redirect(uri:"/");
	}

	//delete a product item
	public function delete(object $data)
	{
		$this->products->destroy($data->id);
		return $this->redirect(uri:"/");
	}

	//show view form to edit a item form
	public function edit(object $data)
	{
		$product = $this->products->getOnly((int)$data->id);
		return $this->view(view:"form",data:$product);
	}

	//update the item product
	public function change(object $data)
	{
		$products = $this->products;
		
		$products->update(
			id:$data->id,
			key:"name",
			value:$data->name
		);
		$products->update(
			id:$data->id,
			key:"price",
			value:$data->price
		);
		$products->update(
			id:$data->id,
			key:"cat",
			value:$data->cat
		);

		return $this->redirect("/");
	}
}