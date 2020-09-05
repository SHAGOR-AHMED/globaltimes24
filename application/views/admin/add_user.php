<?php include('header.php'); ?>

	<div class="inner_content">
		<div class="inner_content_w3_agile_info">
			<div class="agile_top_w3_grids"> 
        <div class="block">
          
          <div class="row">
            <div class="col-md-3"></div>                       
            <div class="col-md-6">
              <div class="panel panel-info">

                <div class="panel-heading"> <i class="fa fa-plus" aria-hidden="true"></i>
                  Add New User
                </div>

                  <div class="panel-body">
                    <?php
                        $message = $this->session->userdata('message');
                        if (isset($message)) {
                            echo '<div class="alert alert-success">' . $message . "</div>";
                            $this->session->unset_userdata('message');
                        }
                    ?>

                    <form action="<?php echo base_url('User/save_user');?>" enctype="multipart/form-data" method="post">

                      <div class="control-group">
                        <label for="userfile">Full Name</label>
                          <input type="text" name="full_name" value="" class="form-control" required>
                      </div>
                      <div class="help-block text-danger"><?php echo form_error('full_name'); ?></div>
                      <br>

                      <div class="control-group">
                        <label for="userfile">Mobile Number</label>
                          <input type="number" name="mobile_no" value="" class="form-control" required>
                      </div>
                      <div class="help-block text-danger"><?php echo form_error('mobile_no'); ?></div>
                      <br>

                      <div class="control-group">
                        <label for="userfile">Username</label>
                          <input type="text" name="username" value="" class="form-control" required>
                      </div>
                      <div class="help-block text-danger"><?php echo form_error('username'); ?></div>
                      <br>

                      <div class="control-group">
                        <label for="userfile">Password</label>
                          <input type="password" name="password" value="" class="form-control" required>
                      </div>
                      <div class="help-block text-danger"><?php echo form_error('password'); ?></div>
                      <br>

                      <div class="control-group">
                        <label for="userfile">Confirm Password</label>
                          <input type="password" name="confirm_password" value="" class="form-control" required>
                      </div>
                      <div class="help-block text-danger"><?php echo form_error('confirm_password'); ?></div>
                      <br>

                      <div class="control-group">
                        <label for="userfile">User Type</label>
                          <select class="form-control" name="user_type">
                            <option value="0">--Select Type--</option>
                            <option value="1">Admin</option>
                            <option value="2">Editor</option>
                            <option value="3">Reporter</option>
                          </select>
                      </div>
                      <br>

                      <div class="control-group">
                        <label for="userfile">User Status</label>
                          <select class="form-control" name="userstatus">
                            <option value="0">--Select Status--</option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                          </select>
                      </div>
                      <br>

                      <div class="form-actions">
                        <button type="submit" name="submit" class="btn btn-primary">Save User</button>
                      </div>

                    </form>
                  </div>
                </div>
            </div>
          </div>
			</div>							
		</div>
	</div>

<?php include('footer.php'); ?>