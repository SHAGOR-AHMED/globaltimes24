<?php
class User_model extends Base_Model {
	
	public function get_users(){

		$query = $this->db->select('*')->from('a_panel')->get()->result();
		return $query;		
	}

	public function user_edit($id = ''){

		$query = $this->db->select('*')->from('a_panel')->where('id', $id)->get()->row();
		return $query;
	}

	public function Update_user_By_ID($UserID,$data){

		$query = $this->db->where('id', $UserID)->update('a_panel', $data);
		return $query;
	}

	public function update_password($userID,$new_pass){

		$this->db->set('password', $new_pass);
		$query = $this->db->where('id', $userID)->update('a_panel');
		return $query;
	}

	public function Delete_User($UserId){

		$result = $this->db->where('id',$UserId)->delete('a_panel');
		return $result;
	}
	

}//End CI_Model
?>