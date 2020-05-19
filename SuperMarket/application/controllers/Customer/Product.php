<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$this->load->model('Product_model');
		$this->load->model('Catalog_model');

	}

	// List all your items
	public function index( $offset = 0 )
	{
         $data['product'] = $this->Product_model->get();
         $data['catalog'] = $this->Catalog_model->get();
         $this->load->view('Customer/ListProduct_view', $data);
	}
	public function getSPDanhMuc($id)
	{
		$data['product']=$this->Catalog_model->getSPbyDanhmuc($id);
        $data['catalog']=$this->Catalog_model->get();
		
		$this->load->view('Customer/ListProduct_view', $data);
}
	

	// Add a new item
	public function add()
	{

	}

	//Update one item
	public function update( $id = NULL )
	{

	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}
}

/* End of file Product.php */
/* Location: ./application/controllers/Customer/Product.php */
