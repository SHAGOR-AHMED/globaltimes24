<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends Base_Model{

	public function category(){

		$query = $this->db->select('*')->from('category')->get()->result();
		
		return $query;
	}

	public function edit_category($id){

		$query = $this->db->select('*')->from('category')->where('cat_id',$id)->get()->row();
		
		return $query;
	}

	public function Update_category($id,$data){

		return $this->db->where('cat_id',$id)->update('category', $data);
	}

	public function delete_category($id){

		return $this->db->where('cat_id',$id)->delete('category');
	}

//=========================== category end ===========================//

	public function subcategory(){

		$this->db->select('*');
		$this->db->from('subcategory');
		$this->db->join('category','category.cat_id=subcategory.subcat_catid');
		$query = $this->db->get(); 
		return $query->result();
	}

	public function select_subcategory_byID($id){

		$query = $this->db->select('*')->from('subcategory')->where('subcat_id',$id)->get()->row();
		
		return $query;
	}

	public function update_subcategory($SubcatID, $data){

		return $this->db->where('subcat_id',$SubcatID)->update('subcategory', $data);
	}

    public function delete_subcategory($id){

		return $this->db->where('subcat_id',$id)->delete('subcategory');
	}

}//Category_model

?>