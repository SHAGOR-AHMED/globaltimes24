<?php

defined('BASEPATH') OR exit('Super Admin error');

class News extends Base_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('category_model');
		$this->load->model('news_model');
		$this->load->helper('admin_helper');
	}

//==================== product =============================//

	public function index(){

		$data=array();
        $data['all_news']=$this->news_model->get_news();
		$this->load->view('admin/news',$data);
	}

	public function add_news(){

		$data=array();
		$data['category']=$this->category_model->category();
		$data['subcategory']=$this->category_model->subcategory();
		$this->load->view('admin/add_news',$data,'true');
	}

    public function save_news(){

		$data=array();
		$data['news_headline'] = $this->input->post('news_headline');
		$data['news_catid'] = $this->input->post('news_catid');
		$data['news_subcatid'] = $this->input->post('news_subcatid');
		$data['news_description'] = $this->input->post('news_description');
		$data['is_top_news'] = $this->input->post('is_top_news');

		$UserType = $this->session->userdata('user_type');
		if($UserType == 1){
			$data['is_approved'] = 1;
		}else{
			$data['is_approved'] = 0;
		}

		//$data['news_date'] = CURRENT_TIMESTAMP();
		//$data['news_date'] =  date("Y-m-d");
		$data['news_date'] =  date("Y-m-d h:i:s");

		$UserFullname = $this->session->userdata('full_name');
		$data['post_by'] = $UserFullname;
		
        $config['upload_path'] = 'assets/img/news_image/';
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
            redirect('News/add_news');

        }else{
    		$fdata=$this->upload->data();
            $data['image'] = $config['upload_path'].$fdata['file_name'];
        }

        //$this->debug($data);
		
        $result = $this->news_model->commonInsert('tbl_news', $data);

        if($result){
			$sdata=array();
			$sdata["message"]="News Added Successfully !!!";
			$this->session->set_userdata($sdata);
	        redirect('News/add_news');
		}else{
			$sdata=array();
			$sdata["message"]="Failed to Add !!!";
			$this->session->set_userdata($sdata);
	        redirect('News/add_news');
		}

	}//save_news

	public function edit_news($newsID){
		$data = array();
		$data['selected_news'] = $this->news_model->select_news_byID($newsID);
		$this->load->view('admin/edit_news',$data);
	}

	public function update_news(){

		$newsID = $this->input->post('news_id');
		$news_headline = $this->input->post('news_headline');
		$news_catid = $this->input->post('news_catid');
		$news_subcatid = $this->input->post('news_subcatid');
		$news_description = $this->input->post('news_description');

		$this->db->set('news_headline', $news_headline);
		$this->db->set('news_catid', $news_catid);
		$this->db->set('news_subcatid', $news_subcatid);
		$this->db->set('news_description', $news_description);

		if(isset($newsID) && $newsID != ''){

			$data = array('news_id' => $newsID);
			$prev_info = $this->db->get_where("tbl_news",$data)->row();

			if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] != '')){
				unlink($prev_info->image);
			}
		}

		if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] != '') ){

			$config['upload_path'] = 'assets/img/news_image/';
	        $config['allowed_types'] = 'gif|jpg|png|jpeg';
	        $config['max_size'] = 1024;
	        // $config['max_width'] = 700;
	        // $config['max_height'] = 700;

	        $this->load->library('upload', $config);
	        $error='';
	        $fdata=array();
	        if ( ! $this->upload->do_upload('image')){

	            $error = $this->upload->display_errors();
	            $dt['message'] = $error;
	            $this->session->set_userdata($dt);
	            redirect('News/');

	        }else{

	            $fdata=$this->upload->data();
	            $img = $config['upload_path'] . $fdata['file_name'];
	            $this->db->set('image', $img);
	        }

		}//if

		$result = $this->news_model->update_news($newsID);

		if($result){
			$sdata=array();
			$sdata["message"]="News Updated Successfully !!!";
			$this->session->set_userdata($sdata);
	        redirect('News/');
		}else{
			$sdata=array();
			$sdata["message"]="Failed to Update !!!";
			$this->session->set_userdata($sdata);
	        redirect('News/');
		}

	}//update_news

	public function delete_news($newsID){

		$result = $this->news_model->delete_news($newsID);

		if($result){
			$sdata=array();
			$sdata["delete"]="Deleted Successfully !!!";
			$this->session->set_userdata($sdata);
			redirect('News/');

		}else{
			$sdata=array();
			$sdata["delete"]="Failed to Delete !!!";
			$this->session->set_userdata($sdata);
			redirect('News/');
		}

	}

	public function do_reject($newsID){

		$result = $this->news_model->do_reject($newsID);

		if($result){
			$sdata=array();
			$sdata["message"]="News has been rejected !!!";
			$this->session->set_userdata($sdata);
			redirect('News/');

		}else{
			$sdata=array();
			$sdata["message"]="Failed to reject !!!";
			$this->session->set_userdata($sdata);
			redirect('News/');
		}

	}

	public function do_approved($newsID){

		$result = $this->news_model->do_approved($newsID);

		if($result){
			$sdata=array();
			$sdata["message"]="News has been Approved !!!";
			$this->session->set_userdata($sdata);
			redirect('News/');

		}else{
			$sdata=array();
			$sdata["message"]="Failed to Approved !!!";
			$this->session->set_userdata($sdata);
			redirect('News/');
		}

	}

//========================================== News Headline ==============================//

	public function NewsHeadline(){

		$data=array();
        $data['all_newsheadline'] = $this->news_model->get_newsHeadline();
		$this->load->view('admin/news_headline',$data);
	}

	public function add_newsHeadline(){

		$data=array();
		$this->load->view('admin/add_newsHeadline',$data,'true');
	}

	public function save_newsHeadline(){

		$data=array();
		$data['news_headline'] = $this->input->post('news_headline');
		
        $result = $this->news_model->commonInsert('tbl_news_headline', $data);

        if($result){
			$sdata=array();
			$sdata["message"]="News Headline Added Successfully !!!";
			$this->session->set_userdata($sdata);
	        redirect('News/add_newsHeadline');
		}else{
			$sdata=array();
			$sdata["message"]="Failed to Added !!!";
			$this->session->set_userdata($sdata);
	        redirect('News/add_newsHeadline');
		}

	}//save_newsHeadline

	public function edit_newsHeadline($ID){
		$data = array();
		$data['selected_headline'] = $this->news_model->select_newsHeadline_byID($ID);
		$this->load->view('admin/edit_newsHeadline',$data);
	}

	public function update_newsHeadline(){

		$headlineID = $this->input->post('headline_id');
		$news_headline = $this->input->post('news_headline');

		$this->db->set('news_headline', $news_headline);

		$result = $this->news_model->update_newsHeadline($headlineID);

		if($result){
			$sdata=array();
			$sdata["message"]="News Headline Updated Successfully !!!";
			$this->session->set_userdata($sdata);
	        redirect('News/NewsHeadline');
		}else{
			$sdata=array();
			$sdata["message"]="Failed to Update !!!";
			$this->session->set_userdata($sdata);
	        redirect('News/NewsHeadline');
		}

	}//update_newsHeadline

	public function delete_newsHeadline($ID){

		$result = $this->news_model->delete_newsHeadline($ID);

		if($result){
			$sdata=array();
			$sdata["delete"]="Deleted Successfully !!!";
			$this->session->set_userdata($sdata);
			redirect('News/NewsHeadline');
		}else{
			$sdata=array();
			$sdata["delete"]="Failed to Delete !!!";
			$this->session->set_userdata($sdata);
			redirect('News/NewsHeadline');
		}
	}


}//News

?>