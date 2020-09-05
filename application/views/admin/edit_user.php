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
                  Update User Information
                </div>

                  <div class="panel-body">
                    <?php
                        $message = $this->session->userdata('message');
                        if (isset($message)) {
                            echo '<div class="alert alert-success">' . $message . "</div>";
                            $this->session->unset_userdata('message');
                        }
                    ?>

                    <form name="userForm" action="<?php echo base_url('User/update_user');?>" enctype="multipart/form-data" method="post">

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
                      <input type="hidden" name="id" value="<?= $user->id ?>">
                      <div class="form-actions">
                        <button type="submit" name="submit" class="btn btn-primary">Update User</button>
                      </div>

                    </form>
                  </div>
                </div>
            </div>
          </div>
			</div>							
		</div>
	</div>
  <script type="text/javascript">
    document.forms['userForm'].elements['user_type'].value='<?= $user->user_type ?>';
    document.forms['userForm'].elements['userstatus'].value='<?= $user->userstatus ?>';
  </script>
<?php include('footer.php'); ?>