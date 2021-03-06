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
                  Upload News
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
                    <form action="<?php echo base_url('news/save_news');?>" enctype="multipart/form-data" method="post">

                      <div class="control-group">
                        <label class="control-label" for="userfile">News Headline</label>
                        <div class="controls">
                          <input type="text" name="news_headline" value="" class="form-control" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label" for="userfile">Select News Category</label>
                        <div class="controls">
                          <select class="form-control" name="news_catid" id="news_catid">
                              <option value="">Select News Categoty</option>
                              <?php getAllcategory(); ?>
                          </select>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="userfile">Select News Sub-Category</label>
                        <div class="controls">
                           <select name="news_subcatid" id="subcat_name" class="form-control">
                                <option value="">Select News Sub-Categoty</option>
                            </select>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="userfile">News Description</label>
                        <div class="controls">
                          <textarea name="news_description" ></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label" for="userfile">Top News</label>
                        <div class="controls">
                          <select class="form-control" name="is_top_news">
                              <option value="">--Select--</option>
                              <option value="1">Yes</option>
                              <option value="2">No</option>
                          </select>
                        </div>
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label" for="userfile">Upload image</label>
                        <div class="controls">
                          <input type="file" name="image" class="form-control">
                        </div>
                        <p style="color:#ff0000;">Image size should be less than 1 MB and resoulation should be 790x425</p>
                      </div>
                      <br>
                      <div class="form-actions">
                        <button type="submit" name="submit" class="btn btn-primary">Upload News</button>
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

    $('#news_catid').change(function () {
        $.get("<?php echo base_url()?>Super_admin/getSubcatByCatId/" + this.value, function (data, status) {
            $('#subcat_name').html(data);
        });
        
    });
        
</script>