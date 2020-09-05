<?php

defined('BASEPATH') OR exit('Super Admin error');

class Category extends Base_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('category_model');
		$this->load->helper('admin_helper');
	}

    public function index(){

		$data=array();
		$data['result']=$this->category_model->category();
		$this->load->view('admin/category',$data);
	}

	public function add_category(){

		$this->load->view('admin/add_category');
	}

	public function save_category(){

        $data=array();
        $data['category']=$this->input->post('category');

        $result = $this->category_model->commonInsert('category', $data);

        if($result){
			$data['message']="Category Added Successfully";
			$this->session->set_userdata($data);
			redirect('category/add_category');
		}else{
			$data['message']="Failed to Add";
			$this->session->set_userdata($data);
			redirect('category/add_category');
		}

	}//category_save

	public function edit_category($id){

		$data=array();
		$data['result']=$this->category_model->edit_category($id);
		$this->load->view('admin/edit_category',$data);
	}

	public function update_category(){

		$id = $this->input->post('id');
		$data['category'] = $this->input->post('category');

		$result = $this->category_model->Update_category($id,$data);

		if($result){
			$sdata = array();
			$sdata["update"] = "Category Update Successfully";
			$this->session->set_userdata($sdata);
			redirect('category');
		}else{

			$sdata=array();
			$sdata["delete"]="Failed to Update";
			$this->session->set_userdata($sdata);
			redirect('category');
		}
	}//update_category

	public function delete_category($id){

		$result = $this->category_model->delete_category($id);

		if($result){
			$sdata=array();
			$sdata["delete"]="Category Delete Successfully";
			$this->session->set_userdata($sdata);
			redirect('category');
		}else{
			$sdata=array();
			$sdata["delete"]="Failed to Delete";
			$this->session->set_userdata($sdata);
			redirect('category');
		}
	}//delete_category

//====================- category end -=============================//

	public function add_subcategory(){

		$data=array();
		$data['category']=$this->category_model->category();
		$this->load->view('admin/add_subcategory',$data,'true');
	}

	public function subcategory(){

		$data=array();
		$data['subcategory']=$this->category_model->subcategory();
		$this->load->view('admin/subcategory',$data);
	}

	public function save_subcategory(){

		$data=array();
		$data['subcat_catid'] = $this->input->post('category');
		$data['subcategory'] = $this->input->post('subcategory');

		$result = $this->category_model->commonInsert('subcategory', $data);

		if($result){
			$data['message']="Subcategory Added Successfully";
			$this->session->set_userdata($data);
			redirect('category/add_subcategory');

		}else{
			$data['message']="Failed to Add";
			$this->session->set_userdata($data);
			redirect('category/add_subcategory');
		}

	}//save_subcategory

	public function edit_subcategory($id){

		$data=array();
		$data['result'] = $this->category_model->select_subcategory_byID($id);
		$this->load->view('admin/edit_subcategory',$data);
	}

	public function update_subcategory(){

		$SubcatID = $this->input->post('subcat_id');
		$data['subcategory'] = trim($this->input->post('subcategory'));

		$result = $this->category_model->update_subcategory($SubcatID, $data);

		if($result){

			$sdata = array();
			$sdata["update"] = "Subcategory Update Successfully";
			$this->session->set_userdata($sdata);
			redirect('category/subcategory');

		}else{

			$sdata=array();
			$sdata["delete"]="Failed to Update";
			$this->session->set_userdata($sdata);
			redirect('category/subcategory');
		}

	}//update_subcategory

	public function delete_subcategory($id){

		$result = $this->category_model->delete_subcategory($id);

		if($result){

			$sdata=array();
			$sdata["delete"]="Deleted Successfully";
			$this->session->set_userdata($sdata);
			redirect('category/subcategory');
		}else{

			$sdata=array();
			$sdata["delete"]="Failed to Delete";
			$this->session->set_userdata($sdata);
			redirect('category/subcategory');
		}
	}

} //Category