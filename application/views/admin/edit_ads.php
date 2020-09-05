<?php include('header.php'); ?>
  
  <div class="inner_content">
    <div class="inner_content_w3_agile_info">
      <div class="agile_top_w3_grids"> 
        <div class="block">
            <div class="row">
            <div class="col-md-2"></div>                       
            <div class="col-md-8">
              <div class="panel panel-info">

                <div class="panel-heading" style="text-align: center;font-size: 16px;"> <i class="fa fa-star" aria-hidden="true"></i>
                  Update News
                </div>

                  <div class="panel-body">
                    <?php
                      $img_msg = $this->session->userdata('img_msg');
                      if (isset($img_msg)) {
                        echo '<div class="alert alert-danger">' . $img_msg . "</div>";
                        $this->session->unset_userdata('img_msg');
                      }
                    ?>

                    <?php
                      $message=$this->session->userdata('message');
                      if($message){
                        
                        echo '<div class="alert alert-success">' . $message . "</div>";
                        $this->session->unset_userdata('message');
                      }
                    ?>
                    <form name="ads" action="<?php echo base_url('Ads/update_ads');?>" enctype="multipart/form-data" method="post">

                      <div class="form-group">
                        <label class="control-label" for="userfile">Select Category</label>
                        <div class="controls">
                          <select class="form-control" name="category">
                              <option value="0">Select Categoty</option>
                              <option value="1">Main Page</option>
                              <option value="2">Right Side</option>
                          </select>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="userfile">Select Position</label>
                        <div class="controls">
                           <select name="position" class="form-control">
                                <option value="0">Select Position</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                <option value="4">Four</option>
                            </select>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="userfile">Link</label>
                        <div class="controls">
                          <input type="text" name="link" value="<?= $selected_ads->link;?>" class="form-control" required>
                        </div>
                      </div>

                      <div class="control-group">
                        <div class="controls">
                          <img src="<?= base_url($selected_ads->image);?>" height="120px" width="130px">
                        </div>
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label" for="userfile">Upload image</label>
                        <div class="controls">
                          <input type="file" name="image" class="form-control">
                        </div>
                        <p>Image size should be less than 1 MB</p>
                      </div>
                      <br>

                      <input type="hidden" name="ads_id" class="form-control" value="<?= $selected_ads->ads_id;?>">

                      <div class="form-actions">
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
            <div class="col-md-2"></div> 
          </div>
        </div>
        <!-- /block -->   
      </div>              
    </div>
  </div>

<?php include('footer.php'); ?>

<script type="text/javascript">
  
  document.forms['ads'].elements['category'].value='<?= $selected_ads->category?>';
  document.forms['ads'].elements['position'].value='<?= $selected_ads->position?>';

</script>