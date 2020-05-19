<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->model('Order_model');
		$this->load->model('Orderdetail_model');
		//Load Dependencies

	}

	// List all your items
	public function index( $offset = 0 )
	{
        $this->load->view('Customer/Checkout_view');
	}

	// Add a new item
	public function add()
	{
        $data = $this->input->post();
       
       
    
        
        $tongtien = $this->cart->total();
        $length = 5;
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = 'DH_';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
            $order = ['user_code' =>$data['code_user'],'code_transaction'=>$randomString,'user_name'=>$data['user_name'],'user_email'=>$data['user_email'], 'user_phone'=>$data['user_phone'],  'user_address'=>$data['address'],'total_price'=>$tongtien, 'message'=>$data['message'], 'payment'=>$data['payment_method']];
              $id = $this->Order_model->insert($order);


              
             if ($id) {
           	   //insert từng mặt hàng cho đơn hàng của khách hàng
           $cart = $this->cart->contents();

           
           foreach ($cart as $key => $value) {
           	  $orderdetail = ['transaction_id' =>$id,'product_code' =>$value['code_product'],'qty' =>$value['qty'],'price' =>$value['price']];
           	  $this->Orderdetail_model->insert($orderdetail);

           }
	}
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

/* End of file Checkout.php */
/* Location: ./application/controllers/Customer/Checkout.php */
