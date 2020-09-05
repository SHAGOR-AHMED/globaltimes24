<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends Base_Controller {

	public function __construct(){
		parent:: __construct();	

		// if ($this->session->userdata('user_id') == null || $this->session->userdata('user_id') < 1) {
                   
  //           if ($this->router->class != 'login'){                        
  //               redirect(base_url());
  //           }
  //       }
		
		$this->load->model("user_model");
		$this->load->helper('admin_helper');	
	}
	

	public function index(){

		$data = array();
		$data['title'] = "All User list";
		$data['users'] = $this->user_model->get_users();
		$this->load->view('admin/user',$data);
	}
	
	public function create(){

		$data['title'] = "Add New User";
		$this->load->view('admin/add_user');
	}
	

	public function save_user(){

		$this->form_validation->set_rules('full_name', 'Full Name', 'required');
		$this->form_validation->set_rules('mobile_no', 'Mobile Number', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');


		if($this->form_validation->run() == FALSE){

			$this->load->view('admin/add_user');
			return false;

		}else{

			$data['full_name'] = $this->input->post('full_name');
			$data['mobile_no'] = $this->input->post('mobile_no');
			$data['username'] = $this->input->post('username');
			$data['password'] = md5($this->input->post('password'));
			$data['user_type'] = $this->input->post('user_type');
			$data['userstatus'] = $this->input->post('userstatus');

			$result = $this->user_model->commonInsert('a_panel', $data);
			if($result){
				$data['message'] = $data['full_name']." has been created Successfully";
				$this->session->set_userdata($data);
				redirect('user/index');
			}else{
				$data['message'] = $data['full_name']."Failed to Add User!!";
				$this->session->set_userdata($data);
				redirect('user/index');
			}
			
		}//if
		
	}//save_user

	public function edit($id=''){
		
		$data['user'] = $this->user_model->user_edit($id);	
		$this->load->view('admin/edit_user', $data);
			
	}

	public function update_user(){

		$UserID = $this->input->post('id');
		$data['user_type'] = $this->input->post('user_type');
		$data['userstatus'] = $this->input->post('userstatus');

		$result = $this->user_model->Update_user_By_ID($UserID,$data);

		if($result){
			$data['message'] = 'Updated successfully';
			$this->session->set_userdata($data);
			redirect('user/index');

		}else{
			$data['message'] = "Failed to update!!";
			$this->session->set_userdata($data);
			redirect('user/index');

		}
			
	}//update_user

    public function DeleteUser($UserId=''){

		$result = $this->user_model->Delete_User($UserId);
		if($result){
			$message = 'Deleted successfully';
			$this->session->set_flashdata('message', $message);
			redirect('user/index');	
		}else{
			$message = 'Failed to Deleted';
			$this->session->set_flashdata('message', $message);
			redirect('user/index');
		}
	}
	

//============================= ============================================//

	public function change_password($userID=''){

		$data['user_id'] =  $userID;
		$data['notices'] = $this->dashboard_model->get_current_notice();
		$data['message'] = $this->session->flashdata('message');
		$data['title'] = "LOTUS | Change Password";
		$this->load->view('backend/template_header', $data);
		$this->load->view('backend/template_left');
		$this->load->view('backend/password_change');
		$this->load->view('backend/template_footer');
	}

	public function password_change(){
		
		$userID = $this->input->post('id');
    	$old_pass = md5($this->input->post('old_password'));
    	$new_pass = md5($this->input->post('new_password'));
    	$login_type = $this->session->userdata('login_type');

    	if($login_type == 1){

    		$pre_info = $this->db->select('*')->from('user')->where('id', $userID)->get()->row();

	    	$pre_pass = $pre_info->password;

	  		if($pre_pass == $old_pass){

				$result = $this->user_model->update_password($userID,$new_pass);

				if($result){

					$this->session->sess_destroy();
			        $msg = '<font color=red>Password has been changed successfully.</font><br />';
                	$this->index($msg);
                	redirect("login");

				}else{

					$msg = "Fail to update password.!!!";
					$message = $this->msg($msg);
					redirect('user/change_password/'.$userID);
				}

	  		}else{

				$msg = "Old Password doesn't Match.!!!";
				$message = $this->msg($msg);
				redirect('user/change_password/'.$userID);
	  			
	  		}

    	}elseif($login_type == 2){

    		$pre_info = $this->db->select('*')->from('tbl_members')->where('mem_id', $userID)->get()->row();

	    	$pre_pass = $pre_info->password;

	  		if($pre_pass == $old_pass){

				$result = $this->user_model->update_member_password($userID,$new_pass);

				if($result){

					$this->session->sess_destroy();
			        $msg = '<font color=red>Password has been changed successfully.</font><br />';
                	$this->index($msg);
                	redirect("login");

				}else{

					$msg = "Fail to update password.!!!";
					$message = $this->msg($msg);
					redirect('user/change_password/'.$userID);
				}

	  		}else{

				$msg = "Old Password doesn't Match.!!!";
				$message = $this->msg($msg);
				redirect('user/change_password/'.$userID);
	  			
	  		}

    	}//if
		
	
	}//password_change


	public function do_logout(){

    	$this->session->sess_destroy();
        $message = 'You have Logged Out!';
		$msg = $this->msg($message);
        redirect("login");
    }
	
}//CI_Controller

?>