<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ads_model extends Base_Model{

	public function get_ads(){

		$query = $this->db->select('*')->from('tbl_ads')->get()->result(); 
		return $query;
	}

	public function selectAds_byID($adsID){

		$query = $this->db->select('*')->from('tbl_ads')->where('ads_id',$adsID)->get()->row();
		return $query;
	}

	public function update_ads($adsID){

		$result = $this->db->where('ads_id',$adsID)->update('tbl_ads');
		return $result;
	}

	public function delete_ads($adsID){

		$data = array('ads_id' => $adsID);
		$prev_info = $this->db->get_where("tbl_ads",$data)->row();
		unlink($prev_info->image);
		return $this->db->where('ads_id',$adsID)->delete('tbl_ads');
	}

//============== namaz Tiem ============

	public function get_namazTime(){

		$query = $this->db->select('*')->from('namaz_settings')->get()->result(); 
		return $query;
	}

	public function selectInfo_byID($ID){

		$query = $this->db->select('*')->from('namaz_settings')->where('id',$ID)->get()->row();
		return $query;
	}

	public function update_namazTime($ID, $data){

		$result = $this->db->where('id',$ID)->update('namaz_settings', $data);
		return $result;
	}

//======================== video ================================//

	public function get_video(){

		$query = $this->db->select('*')->from('tbl_video')->get()->result(); 
		return $query;
	}

	public function selectVideo_byID($ID){

		$query = $this->db->select('*')->from('tbl_video')->where('id',$ID)->get()->row();
		return $query;
	}

	public function update_video($ID, $data){

		$result = $this->db->where('id',$ID)->update('tbl_video', $data);
		return $result;
	}

}//ads_model

?>