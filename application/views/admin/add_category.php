<?php include('header.php'); ?>

	<div class="inner_content">
		<div class="inner_content_w3_agile_info">
			<div class="agile_top_w3_grids"> 
        <div class="block">
          
          <div class="row">
            <div class="col-md-3"></div>                       
            <div class="col-md-6">
              <div class="panel panel-info">

                <div class="panel-heading"> <i class="fa fa-star" aria-hidden="true"></i>
                  Add Category
                </div>

                  <div class="panel-body">
                    <?php
                        $message = $this->session->userdata('message');
                        if (isset($message)) {
                            echo '<div class="alert alert-success">' . $message . "</div>";
                            $this->session->unset_userdata('message');
                        }
                    ?>

                    <form action="<?php echo base_url('category/save_category');?>" enctype="multipart/form-data" method="post">

                      <div class="control-group">
                        <label for="userfile">News Category Name :</label>
                          <input type="text" name="category" value="" class="form-control" required>
                      </div>
                      <br>

                      <div class="form-actions">
                        <button type="submit" name="submit" class="btn btn-primary">Save Category</button>
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