<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Transaction_model');
		$this->load->model('Transactiondetail_model');
		//Load Dependencies

	}

	// List all your items
	public function index( $offset = 0 )
	{
        $data['transaction'] = $this->Transaction_model->get();
        $this->load->view('Admin/Transaction_view', $data);
	}
	public function transactiondetail($id)
	{
		    
		    $datas['get_transaction'] = $this->Transaction_model->getTransaction($id);
		    $datas['get_transactiondetail'] = $this->Transactiondetail_model->get();
		    $this->load->view('Admin/Transactiondetail_view',$datas);
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

/* End of file Transaction.php */
/* Location: ./application/controllers/Admin/Transaction.php */
