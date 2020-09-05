<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('news_model');
		$this->load->model('category_model');
	}

	public function index(){

		$data = array();
		$data['slider'] = TRUE;
		$data['title'] = "globaltimes24 | 24/7 Online News Portal";
		$data['all_newsheadline'] = $this->news_model->get_newsHeadline();
		$data['all_category'] = $this->category_model->category();
		$data['focus_news'] = $this->db->select('*')->from('tbl_news')->where('is_top_news',1)->where('is_approved',1)->order_by("news_id", "DESC")->limit(1)->get()->result();
		$data['top_news'] = $this->db->select('*')->from('tbl_news')->where('is_top_news',1)->where('is_approved',1)->order_by("news_id", "DESC")->limit(4)->get()->result();
		$data['life_style'] = $this->db->select('*')->from('tbl_news')->where('news_catid',8)->where('is_approved',1)->order_by("news_id", "DESC")->limit(4)->get()->result();
		$data['global_news'] = $this->db->select('*')->from('tbl_news')->where('is_approved',1)->order_by("news_id", "DESC")->limit(3)->get()->result();
		$data['recent_news'] = $this->db->select('*')->from('tbl_news')->where('is_approved',1)->order_by("news_id", "DESC")->limit(4)->get()->result();
		$data['sidebar_recent_news'] = $this->db->select('*')->from('tbl_news')->where('is_approved',1)->order_by("news_id", "DESC")->limit(8)->get()->result();
		$data['popular_news'] = $this->db->select('*')->from('tbl_news')->where('is_approved',1)->order_by("news_hit", "DESC")->limit(8)->get()->result();
		$data['random_news'] = $this->db->select('*')->from('tbl_news')->where('is_approved',1)->order_by('rand()')->limit(6)->get()->result();
		$data['national_news'] = $this->db->select('*')->from('tbl_news')->where('is_approved',1)->where('news_catid',1)->order_by("news_id", "DESC")->limit(4)->get()->result();
		$data['political_news'] = $this->db->select('*')->from('tbl_news')->where('news_catid',2)->where('is_approved',1)->order_by("news_id", "DESC")->limit(4)->get()->result();
		$data['sports_news'] = $this->db->select('*')->from('tbl_news')->where('news_catid',6)->where('is_approved',1)->order_by("news_id", "DESC")->limit(6)->get()->result();
		
		$data['content'] = $this->load->view('frontend/page/body', $data, true);
		$this->load->view('frontend/index',$data);

	}//index

	public function news_details($newsID = ''){

		$data = array();
		$data['slider'] = FALSE;
		$data['title'] = "Details News";
		$data['all_newsheadline'] = $this->news_model->get_newsHeadline();
		$data['all_category'] = $this->category_model->category();
		$data['news_details'] = $this->news_model->select_news_byID($newsID);
		$CatID = $data['news_details']->news_catid;
		$newsHit = $data['news_details']->news_hit;
		$IncreaseHit = $newsHit+1;
		// echo $newsHit;echo '<hr>';echo $IncreaseHit;exit();
		$this->news_model->update_newsHit_byID($newsID, $IncreaseHit);
		$data['popular_news'] = $this->db->select('*')->from('tbl_news')->where('news_catid', $CatID)->order_by("news_hit", "DESC")->limit(6)->get()->result();
		$data['random_news'] = $this->db->select('*')->from('tbl_news')->where('news_catid', $CatID)->order_by('rand()')->limit(6)->get()->result();
		$data['content'] = $this->load->view('frontend/page/news_details', $data, true);
		$this->load->view('frontend/index',$data);
	}

	public function NewsByCatID($catID = ''){

		$data = array();
		$data['slider'] = FALSE;
		$data['title'] = "News by Category";
		$data['all_category'] = $this->category_model->category();
		$data['all_newsheadline'] = $this->news_model->get_newsHeadline();
		$data['all_news'] = $this->db->select('*')->from('tbl_news')->where('news_catid', $catID)->where('is_approved',1)->order_by("news_id", "DESC")->limit(9)->get()->result();
		$data['popular_news'] = $this->db->select('*')->from('tbl_news')->where('news_catid', $catID)->where('is_approved',1)->order_by("news_hit", "DESC")->limit(6)->get()->result();
		$data['random_news'] = $this->db->select('*')->from('tbl_news')->where('news_catid', $catID)->where('is_approved',1)->order_by('rand()')->limit(6)->get()->result();
		$data['content'] = $this->load->view('frontend/page/category_news', $data, true);
		$this->load->view('frontend/index',$data);
	}

	public function NewsBySubID($SubCatID = ''){
		
		$data = array();
		$data['slider'] = FALSE;
		$data['title'] = "News by Sub Category";
		$data['all_category'] = $this->category_model->category();
		$data['all_newsheadline'] = $this->news_model->get_newsHeadline();
		$data['all_subNews'] = $this->db->select('*')->from('tbl_news')->where('news_subcatid', $SubCatID)->where('is_approved',1)->order_by("news_id", "DESC")->limit(6)->get()->result();
		$data['popular_news'] = $this->db->select('*')->from('tbl_news')->where('news_subcatid', $SubCatID)->where('is_approved',1)->order_by("news_hit", "DESC")->limit(6)->get()->result();
		$data['random_news'] = $this->db->select('*')->from('tbl_news')->where('news_subcatid', $SubCatID)->where('is_approved',1)->order_by('rand()')->limit(6)->get()->result();
		$data['content'] = $this->load->view('frontend/page/subcategory_news', $data, true);
		$this->load->view('frontend/index',$data);
	}

}//welcome

?>