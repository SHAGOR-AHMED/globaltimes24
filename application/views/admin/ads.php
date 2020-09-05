<?php include('header.php'); ?>

    <div class="inner_content">
        <div class="inner_content_w3_agile_info">
            <div class="agile_top_w3_grids">
                <div class="panel panel-info">
                    <div class="panel-heading"> <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        <!-- <a href="<?php print base_url('Ads/add_');?>">
                            <i class="fa fa-plus"></i> ADD NEW
                        </a> -->
                        All Ads
                    </div>
                    <?php
                        if($this->session->userdata('message')){
                            print '<div class="alert alert-success">'.$this->session->userdata('message').'</div>';
                            $this->session->unset_userdata('message');

                        }elseif($this->session->userdata('delete')){
                            print '<div class="alert alert-danger">'.$this->session->userdata('delete').'</div>';
                            $this->session->unset_userdata('delete');
                        }
                    ?>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <table id="sample-table-2" class="table table-striped table-bordered table-hover roni">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Category</th>
                                        <th>Position</th>
                                        <th>Link</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i=1;
                                        foreach ($all_ads as $value) {
                                    ?>
                                        <tr>
                                            <td class="center"><?php print $i++;?></td>
                                            <td class="center"><?php SelectedCategory($value->category);?></td>
                                            <td class="center"><?php SelectedPosition($value->position);?></td>
                                            <td class="center"><?php print $value->link;?></td>
                                            <td class="center">
                                                <a href="<?php print base_url($value->image);?>" target="_blank">
                                                    <img src="<?php print base_url($value->image);?>" width="100" height="100">
                                                </a>
                                            </td>
                                            <td class="center">
                                                <a href="<?php print base_url('Ads/edit_ads/'.$value->ads_id);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> |
                                                <a href="<?php print base_url('Ads/delete_ads/'.$value->ads_id);?>" onclick="return confirm('Are you sure ?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function chk() {
            var con = confirm('Are you sure ?');
            if (con) {
                return true;
            } else {
                return false;
            }
        }
    </script>

<?php include('footer.php'); ?>