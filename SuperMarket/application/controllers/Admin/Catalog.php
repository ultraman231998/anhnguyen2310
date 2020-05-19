<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Catalog_model');
		//Load Dependencies

	}

	// List all your items
	public function index( $offset = 0 )
	{
		 $data['catalog'] = $this->Catalog_model->get_categories();
		 $data['catalogs'] = $this->Catalog_model->get();
         $this->load->view('Admin/Catalog_view',$data);
	}

	// Add a new item
	public function add()
	{
        $data = $this->input->post();

        
        $object = [
           'name' => $data['name'],
           'parent_id'=>$data['parent_id']
        ];
        $this->Catalog_model->insert($object);
	}

	//Update one item
	public function update()
	{
	     $data = $this->input->post();
	     $object = [
			'name'=>$data['name'],
			'parent_id' => $data['parent_id'],
			
		];
             
            

            
             
		$this->Catalog_model->update($object,$data['id']);
		redirect('Admin/Catalog','refresh');
	}

	//Delete one item
	public function delete( $child_id )
	{
        $this->Catalog_model->delete($child_id);
		redirect('Admin/Catalog','refresh');
	}
	public function multipledelete()
	{
		foreach ($_POST['child_id'] as $id) {
			$this->Catalog_model->delete($id);
		}
		redirect('Admin/Catalog','refresh');
	}
}

/* End of file Catalog.php */
/* Location: ./application/controllers/Admin/Catalog.php */
