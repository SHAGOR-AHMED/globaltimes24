<?php
error_reporting(0);
defined('BASEPATH') OR exit('Super Admin error');

class Super_admin extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
        $this->load->model('Admin_model');
		$this->load->model('news_model');
		$this->load->helper('admin_helper');
	}

	public function index(){

		$data['result']=$this->news_model->get_news();
		$this->load->view('admin/master',$data);
	}

//===================== slider ==============================//

	public function slider(){

		$data=array();
		$data['result']=$this->Admin_model->all_slider();
		$this->load->view('admin/slider',$data);
	}

	public function add_slider(){

		$this->load->view('admin/add_slider');
	}

	public function save_slide(){

		$data=array();
		$data['category'] = $this->input->post('category');

		$config['upload_path'] = 'assets/img/slider/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024;
        $config['max_width'] = 1000;
        $config['max_height'] = 1000;

        $this->load->library('upload', $config);
        $error='';
        $fdata=array();
        if ( ! $this->upload->do_upload('image')){

            $error = $this->upload->display_errors();
            $dt['img_msg'] = $error;
            $this->session->set_userdata($dt);
            redirect(current_url());

        }else{

    		$fdata=$this->upload->data();
            $data['image'] = $config['upload_path'].$fdata['file_name'];

        }

		$result = $this->Admin_model->save_slide_info($data);

		if($result){

			$sdata=array();
			$sdata["message"]="Slider Add Successfully !";
			$this->session->set_userdata($sdata);
        	redirect('super_admin/add_slider');

		}else{

			$sdata=array();
			$sdata["message"]="Failed to Upload !";
			$this->session->set_userdata($sdata);
        	redirect('super_admin/add_slider');

		}

	}

	public function edit_slider($sliderID){

		$data=array();
		$data['result']=$this->Admin_model->select_slider_by_id($sliderID);
		$this->load->view('admin/edit_slider',$data);
	}

	public function update_slide(){

		$data=array();
		$slideID = $this->input->post('slide_id');
		$data['category'] = $this->input->post('category');

		if($this->updateSlidePhoto() != null) {

			if(isset($slideID) && $slideID != ''){

				$data = array('slide_id' => $slideID);
				$prev_info = $this->db->get_where("tbl_slide",$data)->row();

				if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] != '')){
					unlink($prev_info->image);
				}
			}

            $data['image'] = $this->updateSlidePhoto();
        }

		$result = $this->Admin_model->update_slide_info($data,$slideID);

		if($result){

			$sdata=array();
			$sdata["message"]="Slider Update Successfully !";
			$this->session->set_userdata($sdata);
        	redirect('super_admin/slider');

		}else{

			$sdata=array();
			$sdata["message"]="Failed to Upload !";
			$this->session->set_userdata($sdata);
        	redirect('super_admin/slider');

		}

	}

	public function updateSlidePhoto(){

        $this->load->library('upload');
        $config['upload_path'] = './assets/img/slider/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024;
        $config['max_width'] = 700;
        $config['max_height'] = 800;
        $config['encrypt_name'] = false;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('image')) {
            return null;
        }
        $uploadImage = $this->upload->data();
        if ($uploadImage['is_image'] == 1)
            return $config['upload_path'] . $uploadImage['file_name'];
        else
        	$sdata=array();
			$sdata["delete"]="Invalid Image Please select jpg or png";
			$this->session->set_userdata($sdata);
			redirect('products');
    }

//===================== slider end =========================//

//==================== product =============================//

	public function products(){

		$data=array();
        $data['product_d'] = $this->Admin_model->getProductDetails();
        $data['product_e'] = $this->Admin_model->getProductExtra();

        $data['result']=$this->Admin_model->products();
		$this->load->view('admin/products',$data,'true');
	}

	public function add_product(){

		$data=array();
		$data['category']=$this->Admin_model->category();
		$data['subcategory']=$this->Admin_model->subcategory();
		$this->load->view('admin/add_product',$data,'true');
	}

///EXTRA PART WORKING HERE

        public  function getOptionalProductId()
    {

        $optional_id = $this->input->post('id');
        $data['optionaInfo'] = $this->Admin_model->getOptionalProductId($optional_id);

        $this->load->view('admin/updateOptional',$data);

    }

    public function newOptionalProduct(){

        $data['prduct_id'] = $this->input->post('id');
        $data['prduct_ids'] = $this->input->post('ids');
        $data['name'] = $this->input->post('name');
        $this->load->view('admin/addNewOptional', $data);

    }

    public function addOptional()
    {
        $optional = $this->input->post('optional');
        $product_id = $this->input->post('product_id');
        $prduct_ids = $this->input->post('prduct_ids');
        $productSizedata1 = array(
            'prod_id' => $product_id,
            'optional_id' => $prduct_ids,
            'extra_name' => $optional,
        );

        $this->data['error'] = $this->Admin_model->insertproductSizedata1($productSizedata1);

            if (empty($this->data['error'])) {
                $this->session->set_flashdata('successMessage', 'Extra   Added Successfully');
                redirect('super_admin/products');
            } else {
                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('super_admin/products');
            }

    }

    public function  exupdateoptional($id)
    {

        $optional = $this->input->post('optional');
        $product_id = $this->input->post('prod_id');
        $optional_id = $this->input->post('optional_id');

        $productSizedata = array(
            'prod_id' => $product_id,
            'optional_id' => $optional_id,
            'extra_name' => $optional,

        );



        $this->data['error'] = $this->Admin_model->exupdateoptional($id, $productSizedata);


        if (empty($this->data['error'])) {

            $this->session->set_flashdata('successMessage', ' Optional Info Updated Successfully');
            redirect('Super_admin/products');

        } else {

            $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
            redirect('Super_admin/products');

        }
    }

    public function  updateoptional($id)
    {

            $optional = $this->input->post('optional');
            $product_id = $this->input->post('prod_id');
        $optional_id = $this->input->post('optional_id');

        $productSizedata = array(
                'prod_id' => $product_id,
                'optional_id' => $optional_id,
                'op_extra' => $optional,

            );

            $this->data['error'] = $this->Admin_model->updateoptional($id, $productSizedata);


            if (empty($this->data['error'])) {

                $this->session->set_flashdata('successMessage', ' Optional Info Updated Successfully');
                redirect('Super_admin/products');

            } else {

                $this->session->set_flashdata('errorMessage', 'Some thing Went Wrong !! Please Try Again!!');
                redirect('Super_admin/products');

            }
        }


        public function getproductInfoByoptionId()
        {
            $optional_id = $this->input->post('id');
            $data['optionaInfo'] = $this->Admin_model->getOptionalextrProductId($optional_id);
            $this->load->view('admin/ExtrupdateOptional',$data);
        }


        public function deleteexProduct()
        {
            $id = $this->input->post('id');
            $this->Admin_model->exdeleteOptional($id);
            $this->session->set_flashdata('successMessage',' Delete Successfully');
        }

    public function deleteOptional()
    {
           $id = $this->input->post('id');
            $this->Admin_model->deleteOptional($id);
            $this->session->set_flashdata('successMessage','Extra Delete Successfully');
    }


        public function product_save(){

		$data=array();
		$data['prod_name'] = $this->input->post('name');
		$data['prod_catid'] = $this->input->post('category');
		$data['prod_subcatid'] = $this->input->post('subcategory');
		$data['prod_desc'] = $this->input->post('description');
		$data['prod_price'] = $this->input->post('price');
		$data['prod_code'] = $this->input->post('code');
		$data['prod_qty'] = $this->input->post('prod_qty');
        $textbox = $this->input->post('textbox[]');
        $option_ext = $this->input->post('option_extra');
        $config['upload_path'] = 'assets/img/product_image/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024;
        // $config['max_width'] = 700;
        // $config['max_height'] = 700;

        $this->load->library('upload', $config);
        $error='';
        $fdata=array();
        if ( ! $this->upload->do_upload('image')){

            $error = $this->upload->display_errors();
            $dt['img_msg'] = $error;
            $this->session->set_userdata($dt);
            redirect('Super_admin/add_product');

        }else{
    		$fdata=$this->upload->data();
            $data['image'] = $config['upload_path'].$fdata['file_name'];
        }
		$result = $this->Admin_model->product_save($data);
            $productSizedata = array(
               'prod_id'=> $result,
                'op_extra'=>$option_ext
            );

             $result1 = $this->Admin_model->insertproductSizedata($productSizedata);

            for ($i = 0; $i < count($textbox); $i++) {
                $productSizedata1 = array(
                    'prod_id' => $result,
                    'optional_id'=>$result1,
                    'extra_name' => $textbox[$i]

                );

                $result = $this->Admin_model->insertproductSizedataoptiondata($productSizedata1);

        }


        if($result){
			$sdata=array();
			$sdata["message"]="Product Add Successfully !!!";
			$this->session->set_userdata($sdata);
	        redirect('add_product');
		}else{
			$sdata=array();
			$sdata["message"]="Product Add Successfully";
			$this->session->set_userdata($sdata);
	        redirect('add_product');
		}
	}


	public function edit_product($id){

		$data['selected_product'] = $this->Admin_model->select_product($id);

		$this->load->view('admin/edit_product',$data,'true');

	}

	public function UpdateProduct(){

		$prod_id = $this->input->post('prod_id');
		$name = $this->input->post('name');
		$desc = $this->input->post('description');
		$price = $this->input->post('price');
		$code = $this->input->post('code');
		$qty = $this->input->post('prod_qty');

		$this->db->set('prod_name', $name);
		$this->db->set('prod_desc', $desc);
		$this->db->set('prod_price', $price);
		$this->db->set('prod_code', $code);
		$this->db->set('prod_qty', $qty);


		if(isset($prod_id) && $prod_id != ''){

			$data = array('prod_id' => $prod_id);
			$prev_info = $this->db->get_where("product",$data)->row();

			if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] != '')){
				unlink($prev_info->image);
			}
		}

		if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] != '') ){

			$config['upload_path'] = 'assets/img/product_image/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	        $config['max_size'] = 1024;
	        $config['max_width'] = 700;
	        $config['max_height'] = 700;

	        $this->load->library('upload', $config);
	        $error='';
	        $fdata=array();
	        if ( ! $this->upload->do_upload('image')){

	            $error = $this->upload->display_errors();
	            $dt['message'] = $error;
	            $this->session->set_userdata($dt);
	            redirect('super_admin/products');

	        }else{

	            $fdata=$this->upload->data();
	            $img = $config['upload_path'] . $fdata['file_name'];
	            $this->db->set('image', $img);
	        }

		}//if

		$result = $this->Admin_model->update_product($prod_id);

		if($result){
			$sdata=array();
			$sdata["message"]="Product Update Successfully !!!";
			$this->session->set_userdata($sdata);
	        redirect('super_admin/products');
		}else{
			$sdata=array();
			$sdata["message"]="Failed to Add Product !!!";
			$this->session->set_userdata($sdata);
	        redirect('super_admin/products');
		}

	}//UpdateProduct

	public function delete_product($prod_id){

		$result = $this->Admin_model->delete_product($prod_id);

		if($result){

			$sdata=array();
			$sdata["delete"]="Deleted Successfully";
			$this->session->set_userdata($sdata);
			redirect('super_admin/products');

		}else{

			$sdata=array();
			$sdata["delete"]="Failed to Delete";
			$this->session->set_userdata($sdata);
			redirect('super_admin/products');
		}

	}

//==========================================others==============================//

    public function getSubcatByCatId($id = null){

        if ($id != null) {
            $this->load->helper('admin_helper');
            getAllSubcatByCatId($id);
        }
    }

	 public function getSubcatByCatId2($id = null){

        if ($id != null) {
            $this->load->helper('admin_helper');
            getAllSubcatByCatId2($id);
        }
    }

    public function getStateByCountryId($id = null){

        if ($id != null) {
            $this->load->helper('admin_helper');
            getAllStatesByCountryId($id);
        }
    }






} //super_admin