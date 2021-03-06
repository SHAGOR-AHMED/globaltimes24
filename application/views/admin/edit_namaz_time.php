<?php include('header.php'); ?>

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
  
  <div class="inner_content">
    <div class="inner_content_w3_agile_info">
      <div class="agile_top_w3_grids"> 
        <div class="block">
            <div class="row">
            <div class="col-md-2"></div>                       
            <div class="col-md-8">
              <div class="panel panel-info">
                <div class="panel-heading" style="text-align: center;font-size: 16px;"> <i class="fa fa-star" aria-hidden="true"></i>
                  Upload Namaz Time
                </div>
                  <div class="panel-body">
                    <?php
                      $message=$this->session->userdata('message');
                      if($message){
                        
                        echo '<div class="alert alert-success">' . $message . "</div>";
                        $this->session->unset_userdata('message');
                      }
                    ?>
                    <form action="<?php echo base_url('Ads/update_namazTime');?>" enctype="multipart/form-data" method="post">
                      <div class="control-group">
                        <label class="control-label" for="userfile">Name</label>
                        <div class="controls">
                          <input type="text" name="name" value="<?= $selected_info->name; ?>" class="form-control" required>
                        </div>
                      </div>
                      <br>

                      <div class="control-group">
                        <label class="control-label" for="userfile">Start Time</label>
                        <div class="controls">
                          <input type="time" name="start_time" value="<?= $selected_info->start_time; ?>" class="form-control" required>
                        </div>
                      </div>
                      <br>

                      <div class="control-group">
                        <label class="control-label" for="userfile">End Time</label>
                        <div class="controls">
                          <input type="time" name="end_time" value="<?= $selected_info->end_time; ?>" class="form-control" required>
                        </div>
                      </div>
                      <br>

                      <input type="text" name="id" value="<?= $selected_info->id; ?>" class="form-control" required>

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