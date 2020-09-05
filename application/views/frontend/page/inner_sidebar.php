<?php
	$ads1 = $this->db->select('*')->from('tbl_ads')->where('category', 2)->where('position', 1)->get()->row();
	$ads2 = $this->db->select('*')->from('tbl_ads')->where('category', 2)->where('position', 2)->get()->row();
	$ads3 = $this->db->select('*')->from('tbl_ads')->where('category', 2)->where('position', 3)->get()->row();
?>
<div class="col-sm-3">
	<!-- Advertisement Start-->
	<div class="row">
		<div class="col-sm-12 inner-ad">
			<a href="<?= $ads1->link; ?>" target="_blank">
				<img src="<?= base_url($ads1->image);?>" class="img-responsive center-block" alt="Bazar">
			</a>
		</div>
	</div>
	<!-- Advertisement End-->
	<!-- Advertisement Start-->
	<div class="row">
		<div class="col-sm-12 inner-ad">
			<a href="<?= $ads2->link; ?>" target="_blank">
				<img src="<?= base_url($ads2->image);?>" class="img-responsive center-block" alt="Bazar">
			</a>
		</div>
	</div>
	<!-- Advertisement End-->

    <!-- Related Sidebar Start-->
    <div class="row related-news-row">
		<header>
			<h4 class="title-head">এই বিভাগের আরও খবর</h4>
		</header>
		<?php
			foreach ($random_news as $value) {
		?>
			<div class="col-xs-12 col-sm-12 related-news">
				<div class="col-xs-5 col-sm-5 p0">
					<a href="<?= base_url('News-Details/'.$value->news_id);?>">
						<img src="<?= base_url($value->image);?>" class="img-responsive" alt="<?= $value->news_headline; ?>" title="<?= $value->news_headline; ?>">
					</a>
				</div>
				<div class="col-xs-7 col-xs-7 col-sm-7 pr0">
					<h3><a href="<?= base_url('News-Details/'.$value->news_id);?>"><?= $value->news_headline; ?></a></h3>
				</div>
			</div>
		<?php } ?>
    </div>
    <!-- Related Sidebar End -->
	
	<div class="row">
		<div class="col-sm-12 inner-ad">
			<a href="<?= $ads3->link; ?>" target="_blank">
				<img src="<?= base_url($ads3->image);?>" class="img-responsive center-block" alt="Bazar">
			</a>
		</div>
	</div>
	<!-- Advertisement End-->
</div>