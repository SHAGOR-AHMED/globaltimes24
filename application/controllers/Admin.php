<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('news_model');
	}

	public function index(){

		$this->load->view('admin/index');
	}

	public function dashboard(){

		$data['result']=$this->news_model->get_news();
		$this->load->view('admin/master',$data);
	}

	public function admin_login(){

		$result=$this->Admin_model->admin_login();

		if($result){

			$sdata=array();
			$sdata['id'] = $result->id;
			$sdata['admin'] = $result->username;
			$sdata['full_name'] = $result->full_name;
			$sdata['user_type'] = $result->user_type;
			$this->session->set_userdata($sdata);
			redirect('Admin/dashboard');

		}else{

			$sdata=array();
			$sdata['exception']="Username and Password Invalid";
			$this->session->set_userdata($sdata);
			redirect('Admin');
		}
	}

//==================== password change & logout ======================//

    public function change_password(){

    	$this->load->view('admin/change_password');
    }

    public function update_password(){

    	$userID = $this->input->post('id');
    	$old_pass = md5($this->input->post('old_password'));
    	$new_pass = md5($this->input->post('new_password'));
    	$con_pass = md5($this->input->post('confirm_password'));

    	$pre_info = $this->db->select('*')->from('a_panel')->where('id', $userID)->get()->row();
    	$pre_pass = $pre_info->password;

  		if($pre_pass == $old_pass){

  			if($new_pass == $con_pass){

  				$result = $this->Admin_model->update_password($userID,$new_pass);

  				if($result){

  					$this->session->unset_userdata('id');
					$this->session->unset_userdata('admin');
					$this->session->unset_userdata('full_name');
					$this->session->unset_userdata('user_type');
					$sdata=array();
					$sdata["exception"]="Password Updated Successfully ! Login Again";
					$this->session->set_userdata($sdata);
					redirect('Admin/');

				}else{

					$sdata=array();
					$sdata["exception"]="Failed to Update Password";
					$this->session->set_userdata($sdata);
					redirect('Admin/change_password');
				}

  			}else{

  				$sdata=array();
				$sdata["exception"]="Password and Confirm Password doesn't Match.!!!";
				$this->session->set_userdata($sdata);
				redirect('Admin/change_password');

  			}

  		}else{

  			$sdata=array();
			$sdata["exception"]="Old Password doesn't Match.!!!";
			$this->session->set_userdata($sdata);
			redirect('Admin/change_password');

  		}

    }

	public function logout(){

		$this->session->unset_userdata('id');
		$this->session->unset_userdata('admin');
		$this->session->unset_userdata('full_name');
		$this->session->unset_userdata('user_type');
		redirect('Admin');
	}

}//Admin