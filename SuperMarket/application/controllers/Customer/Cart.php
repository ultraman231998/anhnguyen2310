<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->model('User_model');
		//Load Dependencies

	}

	// List all your items
	public function index( $offset = 0 )
	{
             $giohang = $this->cart->contents();
		     $data['sp'] = $giohang;
		     $this->load->view('Customer/Cart_view', $data); 
	}

	// Add a new item
	public function add($id)
	{
         $where = [ 'id' => $id ];
		 $product = $this->Product_model->get($where);
		    $object = array(
           	'id'      => $product['id'],
           	'qty'     => 1,
           	'price'   => $product['discount'],
           	'name'    => $product['name'],
            'code_product'    => $product['code_product'],
           	'img'    => $product['img'],
           );
            
		   $this->cart->insert($object);

		   
		  
		   
		   
            $giohang = $this->cart->contents();
		    $data['sp'] = $giohang;
		    $this->load->view('Customer/Cart_view', $data); 
		    redirect('Customer/Cart','refresh');
        
           
	}

	//Update one item
	public function update( $id = NULL )
	{
// Bước 1: Lấy toàn bộ sản phẩm
    $carts = $this->cart->contents();
    // Bước 2: duyệt giỏ hàng và update theo id người dùng chọn
    foreach ($carts as $key => $value)
    {
          //kiểm tra nếu id trong giỏ hàng == id sản phẩm muốn cập nhật
          $total_qty = $this->input->post('qty_'.$value['id']);

          // echo '<pre>';
          // var_dump($total_qty);
          // echo '</pre>';
          $data = array(
            'rowid' => $key,
            'qty'   => $total_qty
          );
          
          $this->cart->update($data);
        
    }
         $giohang = $this->cart->contents();
         $data['sp'] = $giohang;
         $this->load->view('Customer/Cart_view', $data); 
         redirect('Customer/Cart','refresh');
	}

	//Delete one item
	public function delete( $id = NULL )
	{
             $cart = $this->cart->contents();
           if($id > 0){
                   foreach ($cart as $key => $value) {
                     if ($id==$value['id']) {
                          
                                  $data = array(
                                       'rowid'=> $key,
                                       'qty'=>0
                                  );

                          
                          $this->cart->update($data);
                     } 
                   }
                    $giohang = $this->cart->contents();
                   $data['sp'] = $giohang;
                    $this->load->view('Customer/Cart_view', $data); 
                     redirect('Customer/Cart','refresh');
           }
           else {
                $this->cart->destroy();

                   $giohang = $this->cart->contents();
               $data['sp'] = $giohang;
               $this->load->view('GG/pages/cart', $data); 
                redirect('Customer/Cart','refresh');
           }
	}
	public function totalmoney(){
          $this->cart->total();
}

public function checkout($value='')
{
  if($this->session->userdata('username')){
    //lấy dữ liệu khách hàng dựa vào username và password
       $username =  $this->session->userdata('username');
       $password =  $this->session->userdata('password');
        $where = ['username' => $username, 'password'=>$password];
        $data_user = $this->User_model->get($where);
        
        $data['data_user'] = $data_user;
        
        $datas = $this->cart->contents();
        $data['sp'] = $datas;
         
        $this->load->view('Customer/Checkout_view',$data);

        
      
        

  }
  else {
    $this->load->view('Customer/Login_view');
  }
  
}
}

/* End of file Cart.php */
/* Location: ./application/controllers/Customer/Cart.php */
