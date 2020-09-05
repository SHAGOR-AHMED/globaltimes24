<?php include('header.php'); ?>
    
    <?php
        function limit_words($string, $word_limit){
            $words = explode(" ",$string);
            return implode(" ",array_splice($words,0,$word_limit));
        }
    ?>

    <div class="inner_content">
        <div class="inner_content_w3_agile_info">
            <div class="agile_top_w3_grids">
                <div class="panel panel-info">
                    <div class="panel-heading"> <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        <a href="<?php print base_url('News/add_news');?>">
                            <i class="fa fa-plus"></i> ADD NEW NEWS
                        </a>
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
                    <?php if ($this->session->flashdata('errorMessage')!=null){?>
                        <div class="alert alert-danger" align="center"><strong><?php echo $this->session->flashdata('errorMessage');?></strong></div>
                    <?php }
                    elseif($this->session->flashdata('successMessage')!=null){?>
                        <div class="alert alert-success" align="center"><strong><?php echo $this->session->flashdata('successMessage');?></strong></div>
                    <?php }?>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <table id="sample-table-2" class="table table-striped table-bordered table-hover roni">
                                <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>News Headline</th>
                                    <th>News Date</th>
                                    <th>News Category</th>
                                    <!--<th>News Sub-Category</th>
                                    <th>News Description</th> -->
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i=1;
                                foreach ($all_news as $value) {
                                    ?>
                                    <tr>
                                        <td class="center"><?php print $i++;?></td>
                                        <td class="center"><?php print $value->news_headline;?></td>
                                        <td class="center">
                                            <?php
                                                $timezone = "Asia/Dhaka";
                                                date_default_timezone_set($timezone);
                                                
                                                $dt = new DateTime($value->date);
                                                echo "Published On : ".$dt->format('M j Y g:i A');
                                            ?>
                                        </td>
                                        <td class="center"><?php print $value->category;?></td>
                                        <!-- <td class="center"><?php print $value->subcategory;?></td>
                                        <td class="center">
                                            <?php
                                                echo limit_words(strip_tags($value->news_description,'<p><em><a><br/><b><strong>'),10);
                                            ?>
                                        </td> -->
                                        <td class="center">
                                            <a href="<?php print base_url($value->image);?>" target="_blank">
                                                <img src="<?php print base_url($value->image);?>" width="100" height="100">
                                            </a>
                                        </td>

                                         <td class="center">
                                           <?php
                                            if($value->is_approved == 1){
                                                echo 'Approved';
                                            }else{
                                                echo 'Pending';
                                            }
                                           ?>
                                        </td>
                                        <td class="center">

                                            <?php 
                                                $UserType = $this->session->userdata('user_type');
                                                if($UserType == 1 || $UserType == 2){ 

                                                    if($value->is_approved == 1){ ?>

                                                        <a href="<?php print base_url('News/do_reject/'.$value->news_id);?>" onclick="return confirm('Are you sure ?')">Reject</a> |

                                                <?php }else{ ?>

                                                        <a href="<?php print base_url('News/do_approved/'.$value->news_id);?>" onclick="return confirm('Are you sure ?')">Approve</a> |

                                                <?php } ?>

                                                    <a href="<?php print base_url('News/edit_news/'.$value->news_id);?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> |
                                                    <a href="<?php print base_url('News/delete_news/'.$value->news_id);?>" onclick="return confirm('Are you sure ?')"><i class="fa fa-trash" aria-hidden="true"></i></a>

                                            <?php }else{ ?>

                                                <a href="#" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> |
                                                <a href="#" onclick="return confirm('Are you sure ?')" ><i class="fa fa-trash" aria-hidden="true"></i></a>

                                           <?php } ?>
                                        </td>
                                    </tr>

                                <?php }?>

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