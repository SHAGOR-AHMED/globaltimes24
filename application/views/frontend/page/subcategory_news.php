<?php
	function limit_words($string, $word_limit){
		$words = explode(" ",$string);
		return implode(" ",array_splice($words,0,$word_limit));
	}
?>
<div class="main-body">
	<div class="wrap">
		<div class="single-page">	
			<div class="col-md-9 content-left single-post">
				<!-- এই বিভাগের সকল পঠিত -->
				<header>
					<h3 class="title-head">এই বিভাগের সকল খবর</h3>
				</header>
				<?php
                    foreach ($all_subNews as $value) {
                ?>
					<div class="article">
						<div class="article-left">
							<a href="<?= base_url('welcome/news_details/'.$value->news_id);?>">
								<img src="<?= base_url($value->image);?>" style="height: 200px;width: 400px;">
							</a>
						</div>
						<div class="article-right">
							<div class="article-title">
								<p><?php
                                      	$timezone = "Asia/Dhaka";
                                        date_default_timezone_set($timezone);
                                        $dt = new DateTime($value->date);
                                        echo "Published On : ".$dt->format('M j Y g:i A');
                                    ?>
                                </p>
								<a class="title" href="<?= base_url('welcome/news_details/'.$value->news_id);?>"><?= $value->news_headline; ?></a>
							</div>
							<div class="article-text">
								<p><?php
                                        echo limit_words(strip_tags($value->news_description,'<p><em><a><br/><b><strong>'),10);
                                    ?>
                                </p>
								<a href="<?= base_url('welcome/news_details/'.$value->news_id);?>">
									<img src="<?= base_url('assets/frontend/');?>images/more.png" alt="" />
								</a>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				<?php } ?>
				<!-- // এই বিভাগের সকল পঠিত  -->
				<br>
				<!--  এই বিভাগের সর্বোচ্চ পঠিত -->
				<header>
					<h3 class="title-head">এই বিভাগের সর্বোচ্চ পঠিত</h3>
				</header>
				<?php
                    foreach ($popular_news as $value) {
                ?>
					<div class="col-md-4">
						<a href="<?= base_url('welcome/news_details/'.$value->news_id);?>">
							<img src="<?= base_url($value->image);?>" style="display: block; max-width: 100%; height: 200px;" />
						</a>
						<a class="title" href="<?= base_url('welcome/news_details/'.$value->news_id);?>">
							<?= $value->news_headline; ?>
						</a>
					</div>
				<?php } ?>
				<!-- // এই বিভাগের সর্বোচ্চ পঠিত -->
			</div>
			
			<div class="col-md-3 side-bar">
				<?php include('right_side_inner.php');?>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>