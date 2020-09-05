<?php

defined('BASEPATH') OR exit('Super Admin error');

class Ads extends Base_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->model('ads_model');
		$this->load->helper('admin_helper');
	}

//==================== product =============================//

	public function index(){

		$data=array();
        $data['all_ads']=$this->ads_model->get_ads();
		$this->load->view('admin/ads',$data);
	}

	// public function add_news(){

	// 	$data=array();
	// 	$data['category']=$this->category_model->category();
	// 	$data['subcategory']=$this->category_model->subcategory();
	// 	$this->load->view('admin/add_news',$data,'true');
	// }

 //    public function save_news(){

	// 	$data=array();
	// 	$data['news_headline'] = $this->input->post('news_headline');
	// 	$data['news_catid'] = $this->input->post('news_catid');
	// 	$data['news_subcatid'] = $this->input->post('news_subcatid');
	// 	$data['news_description'] = $this->input->post('news_description');
	// 	//$data['news_date'] = CURRENT_TIMESTAMP();
	// 	//$data['news_date'] =  date("Y-m-d");
	// 	$data['news_date'] =  date("Y-m-d h:i:s");
		
 //        $config['upload_path'] = 'assets/img/news_image/';
 //        $config['allowed_types'] = 'gif|jpg|png|jpeg';
 //        $config['max_size'] = 1024;
 //        // $config['max_width'] = 700;
 //        // $config['max_height'] = 700;

 //        $this->load->library('upload', $config);
 //        $error='';
 //        $fdata=array();
 //        if ( ! $this->upload->do_upload('image')){

 //            $error = $this->upload->display_errors();
 //            $dt['img_msg'] = $error;
 //            $this->session->set_userdata($dt);
 //            redirect('News/add_news');

 //        }else{
 //    		$fdata=$this->upload->data();
 //            $data['image'] = $config['upload_path'].$fdata['file_name'];
 //        }

 //        //$this->debug($data);
		
 //        $result = $this->ads_model->commonInsert('tbl_news', $data);

 //        if($result){
	// 		$sdata=array();
	// 		$sdata["message"]="News Added Successfully !!!";
	// 		$this->session->set_userdata($sdata);
	//         redirect('News/add_news');
	// 	}else{
	// 		$sdata=array();
	// 		$sdata["message"]="Failed to Add !!!";
	// 		$this->session->set_userdata($sdata);
	//         redirect('News/add_news');
	// 	}

	// }//save_news

	public function edit_ads($adsID){
		$data = array();
		$data['selected_ads'] = $this->ads_model->selectAds_byID($adsID);
		$this->load->view('admin/edit_ads',$data);
	}

	public function update_ads(){

		$adsID = $this->input->post('ads_id');
		$category = $this->input->post('category');
		$position = $this->input->post('position');
		$link = $this->input->post('link');

		$this->db->set('category', $category);
		$this->db->set('position', $position);
		$this->db->set('link', $link);

		if(isset($adsID) && $adsID != ''){

			$data = array('ads_id' => $adsID);
			$prev_info = $this->db->get_where("tbl_ads",$data)->row();

			if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] != '')){
				unlink($prev_info->image);
			}
		}

		if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] != '') ){

			$config['upload_path'] = 'assets/img/ads_image/';
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
	            redirect('Ads/');

	        }else{

	            $fdata=$this->upload->data();
	            $img = $config['upload_path'] . $fdata['file_name'];
	            $this->db->set('image', $img);
	        }

		}//if

		$result = $this->ads_model->update_ads($adsID);

		if($result){
			$sdata=array();
			$sdata["message"]="Ads Updated Successfully !!!";
			$this->session->set_userdata($sdata);
	        redirect('Ads/');
		}else{
			$sdata=array();
			$sdata["message"]="Failed to Update !!!";
			$this->session->set_userdata($sdata);
	        redirect('Ads/');
		}

	}//update_ads

	public function delete_ads($adsID){

		$result = $this->ads_model->delete_ads($adsID);

		if($result){
			$sdata=array();
			$sdata["delete"]="Deleted Successfully !!!";
			$this->session->set_userdata($sdata);
			redirect('Ads/');

		}else{
			$sdata=array();
			$sdata["delete"]="Failed to Delete !!!";
			$this->session->set_userdata($sdata);
			redirect('Ads/');
		}
	}

//================= namaz time ====================//

	public function NamazTime(){

		$data=array();
        $data['namazTime']=$this->ads_model->get_namazTime();
		$this->load->view('admin/namaz_time',$data);
	}	

	public function edit_namazTime($ID){
		$data = array();
		$data['selected_info'] = $this->ads_model->selectInfo_byID($ID);
		$this->load->view('admin/edit_namaz_time',$data);
	}

	public function update_namazTime(){

		$ID = $this->input->post('id');
		$data['name'] = $this->input->post('name');
		$data['start_time'] = $this->input->post('start_time');
		$data['end_time'] = $this->input->post('end_time');

		$result = $this->ads_model->update_namazTime($ID, $data);

		if($result){
			$sdata=array();
			$sdata["message"]="Update Successfully !!!";
			$this->session->set_userdata($sdata);
			redirect('Ads/NamazTime');

		}else{
			$sdata=array();
			$sdata["message"]="Failed to Update !!!";
			$this->session->set_userdata($sdata);
			redirect('Ads/NamazTime');
		}
	}

//================= Video ====================//

	public function Video(){

		$data=array();
        $data['video']=$this->ads_model->get_video();
		$this->load->view('admin/video',$data);
	}

	public function edit_video($ID){
		$data = array();
		$data['selected_info'] = $this->ads_model->selectVideo_byID($ID);
		$this->load->view('admin/edit_video',$data);
	}

	public function update_video(){

		$ID = $this->input->post('id');
		$data['link'] = $this->input->post('link');

		$result = $this->ads_model->update_video($ID, $data);

		if($result){
			$sdata=array();
			$sdata["message"]="Update Successfully !!!";
			$this->session->set_userdata($sdata);
			redirect('Ads/Video');
		}else{
			$sdata=array();
			$sdata["message"]="Failed to Update !!!";
			$this->session->set_userdata($sdata);
			redirect('Ads/Video');
		}
	}

}//Ads

?>