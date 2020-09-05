<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends Base_Model{

	public function get_news(){

		$this->db->select('*');
		$this->db->from('tbl_news');
        $this->db->order_by("news_id", "DESC");
        $this->db->join('category','category.cat_id = news_catid');
		$this->db->join('subcategory','subcategory.subcat_id = news_subcatid', 'LEFT');
		$query = $this->db->get(); 
		return $query->result();
	}

	public function select_news_byID($newsID){

		$query = $this->db->select('*')->from('tbl_news')->where('news_id',$newsID)->get()->row();
		return $query;
	}

	public function update_news($newsID){

		$result = $this->db->where('news_id',$newsID)->update('tbl_news');
		return $result;
	}

	public function delete_news($newsID){

		$data = array('news_id' => $newsID);
		$prev_info = $this->db->get_where("tbl_news",$data)->row();
		unlink($prev_info->image);
		return $this->db->where('news_id',$newsID)->delete('tbl_news');
	}

	public function update_newsHit_byID($newsID, $IncreaseHit){

		$this->db->set('news_hit', $IncreaseHit);
		$result = $this->db->where('news_id',$newsID)->update('tbl_news');
		return $result;
	}

	public function do_reject($newsID){

		$result = $this->db->set('is_approved', 0)->where('news_id',$newsID)->update('tbl_news');
		return $result;
	}

	public function do_approved($newsID){

		$result = $this->db->set('is_approved', 1)->where('news_id',$newsID)->update('tbl_news');
		return $result;
	}

	// public function select_product_by_CatID($CatID){

	// 	$query = $this->db->select('*')->from('product')->where('prod_catid',$CatID)->get()->result();
	// 	return $query;
	// }

	// public function select_product_by_subid($Subid){

	// 	$query = $this->db->select('*')->from('product')->where('prod_subcatid',$Subid)->get()->result();
	// 	return $query;
	// }

//======================= news headline ==================//

	public function get_newsHeadline(){

		$query = $this->db->select('*')->from('tbl_news_headline')->order_by("headline_id", "DESC")->get()->result(); 
		return $query;
	}

	public function select_newsHeadline_byID($ID){

		$query = $this->db->select('*')->from('tbl_news_headline')->where('headline_id',$ID)->get()->row();
		return $query;
	}

	public function update_newsHeadline($headlineID){

		$result = $this->db->where('headline_id',$headlineID)->update('tbl_news_headline');
		return $result;
	}

	public function delete_newsHeadline($ID){

		return $this->db->where('headline_id',$ID)->delete('tbl_news_headline');
	}


}//News_model

?>