<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->model('Catalog_model');
		$this->load->model('Admin_model');
		//Load Dependencies

	}

	// List all your items
	public function index( $offset = 0 )
	{
		
		if (!empty($_SESSION['username'])) {
			
		$this->load->view('Admin/Home_view');
		}
		else {
			$this->load->view('Admin/LoginAdmin_view');
		}

	}
	public function Product()
	{
		if (!empty($_SESSION['username'])) {
			$data['product'] = $this->Product_model->get();
		    $this->load->view('Admin/Product_view',$data);
		}
		else {
			redirect('Admin/Admin/LoginView','refresh');
		}
	}
	public function AddProduct_view()
	{

		
		if (!empty($_SESSION['username'])) {
			$data['catalog'] = $this->Catalog_model->get_categories();
		    $this->load->view('Admin/AddProduct_view',$data);
		}
		else {
			redirect('Admin/Admin/LoginView','refresh');
		}
	}
	public function GetProduct_view($id)
	{
		
			if (!empty($_SESSION['username'])) {
			$datas['catalog'] = $this->Catalog_model->get_categories();
		    $datas['get_product'] = $this->Product_model->getProduct($id);
		    $this->load->view('Admin/EditProduct_view',$datas);
		}
		else {
			redirect('Admin/Admin/LoginView','refresh');
		}

	}
	// Add a new item
	public function add()
	{
		if (!empty($_SESSION['username'])) {
			$length = 5;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = 'SP_';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}

		$data = $this->input->post();


		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '10000';
		$config['max_width']  = '10240';
		$config['max_height']  = '76800';
		
		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload('img')){
			
			$data1 = array('upload_data' => $this->upload->data());
			$img=($config['upload_path']).($data1['upload_data']['file_name']);
		}
		else {
			$img = 'không có ảnh';
		}

		$object = [
			'code_product' => $randomString,
			'name'=>$data['name'],
			'price' => $data['price'],
			'discount' => $data['discount'],
			'catalog_id' => $data['catalog_id'],
			'amount' => $data['amount'],
			'content' => $data['content'],
			'img' => $img

		];

		$res = $this->Product_model->insert($object);
		
		if ($res) {
			$this->session->set_flashdata('add_success', 'Thêm thành công');
			$this->session->set_flashdata('add_error', '');
			redirect('Admin/Admin/Product','refresh');
		}
		else {
			$this->session->set_flashdata('add_success', '');
			$this->session->set_flashdata('add_error', 'Thêm ko thành công');
			redirect('Admin/Admin/Product','refresh');
		}
		
		}
		else {
			redirect('Admin/Admin/LoginView','refresh');
		}


	}

	


	//Update one item
	public function update()
	{
		if (!empty($_SESSION['username'])) {
				$datap = $this->input->post();

		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '10000';
		$config['max_width']  = '10240';
		$config['max_height']  = '76800';
		
		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload('img')){
			
			$data1 = array('upload_data' => $this->upload->data());
			$img=($config['upload_path']).($data1['upload_data']['file_name']);
		}
		else{
			$getData=$this->Product_model->getProduct($datap['id']);
			$img=$getData[0]['img'];

		}

		$object = [
			'name'=>$datap['name'],
			'price' => $datap['price'],
			'discount' => $datap['discount'],
			'catalog_id' => $datap['catalog_id'],
			'amount' => $datap['amount'],
			'content' => $datap['content'],
			'img' => $img
		];

		$res = $this->Product_model->update($object,$datap['id']);
		if ($res) {
			$this->session->set_flashdata('edit_success', 'Sửa thành công');
			$this->session->set_flashdata('edit_error', '');
			redirect('Admin/Admin/Product','refresh');
		}
		else {
			$this->session->set_flashdata('edit_success', '');
			$this->session->set_flashdata('edit_error', 'Sửa ko thành công');
			redirect('Admin/Admin/Product','refresh');
		}
		
		}
		else {
			redirect('Admin/Admin/LoginView','refresh');
		}

	
	}
	

	//Delete one item
	public function delete( $id )
	{
			if (!empty($_SESSION['username'])) {
			$this->Product_model->delete($id);
		redirect('Admin/Admin/Product','refresh');
		}
		else {
			redirect('Admin/Admin/LoginView','refresh');
		}

		
	}
	public function multipledelete()
	{
		if (!empty($_SESSION['username'])) {
				foreach ($_POST['id'] as $id) {
			$this->Product_model->delete($id);
		}
		redirect('Admin/Admin/Product','refresh');
		}
		else {
			redirect('Admin/Admin/LoginView','refresh');
		}
	
	}

	public function LoginView()
	{
		$this->load->view('Admin/LoginAdmin_view');
	}
	public function checklogin()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Tài khoản', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('password', 'Mật khẩu', 'trim|required|min_length[5]|max_length[12]');
		if ($this->form_validation->run() == TRUE) {
			# code...
			//kiểm tra tài khoản có tồn tại trong CSDL?
			$data = $this->input->post();
			if($this->Admin_model->checkUserPass($data['username'],$data['password'])){

				    $array = array(
				    	'username' => $data['username'],
				    	'password' => $data['password'],
				    	
				    );
				    $user = $this->Admin_model->get($array);
				    
				    $this->session->set_userdata($user);
				 
		        redirect('Admin/Admin/','refresh');
                   
			}
			else {
				$this->session->set_flashdata('intval_user_pass', 'Sai tài khoản hoặc mật khẩu');
				$this->load->view('Admin/LoginAdmin_view');
		}
		} else {
			# code...
			$this->load->view('Admin/LoginAdmin_view');
		}
	}
	public function logout(){
		  $this->session->sess_destroy();
		  $this->load->view('Admin/LoginAdmin_view');
		  redirect('Admin/Admin/LoginView','refresh');
	}


}

/* End of file Admin_controller.php */
/* Location: ./application/controllers/Admin/Admin_controller.php */
