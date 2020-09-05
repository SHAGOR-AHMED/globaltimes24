<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{
	
	public function admin_login(){

        $user_type = $this->input->post('user_type');
		$name = $this->input->post('name');
		$password = md5($this->input->post('password'));

		$this->db->select('*');
		$this->db->from('a_panel');
        $this->db->where('user_type',$user_type);
		$this->db->where('username',$name);
		$this->db->where('password',$password);
		$get = $this->db->get();
		$get2 = $get->row();
		return $get2;
	}

	public function update_password($userID,$new_pass){

		$this->db->set('password', $new_pass);
		$query = $this->db->where('id', $userID)->update('a_panel');
		return $query;
	}

//================ slider ===================//

	public function save_slide_info($data){

		$result = $this->db->insert('tbl_slide',$data);
		return $result;
	}

	public function all_slider(){

		$query = $this->db->select('*')->from('tbl_slide')->get()->result_array();
		return $query;

	}

	public function select_slider_by_id($sliderID){

		$query = $this->db->select('*')->from('tbl_slide')->where('slide_id',$sliderID)->get()->row();
		return $query;

	}

	public function update_slide_info($data,$slideID){

		$result = $this->db->where('slide_id',$slideID)->update('tbl_slide',$data);
		return $result;
	}
//=================== slide end =========================//


}//Admin_model

?>