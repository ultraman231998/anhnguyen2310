<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->model('Catalog_model');
		$this->load->model('User_model');
		//Load Dependencies

	}

	// List all your items
	public function index( $offset = 0 )
	{
		 $data['product'] = $this->Product_model->getProductShow();
         $this->load->view('Customer/Home_view',$data);
	}
	public function RegisterView()
	{
		$this->load->view('Customer/Register_view');
	}
	public function LoginView()
	{
		$this->load->view('Customer/Login_view');
	}
	public function add_user()
	{
			$length = 5;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = 'User_';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}

		$data = $this->input->post();
		$object = [
		  'code_user' =>$randomString,
          'name' => $data['name'],
          'username' => $data['username'],
          'password' => $data['password'],
          'email' => $data['email'],
          'address' => $data['address'],
          'phone' => $data['phone']
		];
		$this->User_model->insert($object);
		redirect('Customer/Home/RegisterView','refresh');
	}
	public function checkloginUser()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Tài khoản', 'trim|required|min_length[5]|max_length[20]');
		$this->form_validation->set_rules('password', 'Mật khẩu', 'trim|required|min_length[5]|max_length[12]');
		if ($this->form_validation->run() == TRUE) {
			$data1 = $this->input->post();
			if($this->User_model->checkUserPass($data1['username'],$data1['password'])){

				    $array = array(
				    	'username' => $data1['username'],
				    	'password' => $data1['password'],
				    	
				    );
				    $user = $this->User_model->get($array);
				    
				    $this->session->set_userdata($user);
				 
		            redirect('Customer/Home','refresh');
                   
			}
			else {
				$this->session->set_flashdata('intval_user_pass', 'Sai tài khoản hoặc mật khẩu');
				$this->load->view('Customer/Login_view');
		}
		} else {
			# code...
			$this->load->view('Customer/Login_view');
		}
	}
	public function logout(){
		  $this->session->sess_destroy();
		  
		  redirect('Customer/Home','refresh');
	}
	public function getProduct($id)
	{
		    $data['get_catalog'] = $this->Catalog_model->get();
		    $data['get_product'] = $this->Product_model->getProduct($id);
		    $this->load->view('Customer/ProductDetail_view',$data);
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

/* End of file Home.php */
/* Location: ./application/controllers/Customer/Home.php */
