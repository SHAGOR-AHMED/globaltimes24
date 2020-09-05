<?php
    function limit_words($string, $word_limit){
        $words = explode(" ",$string);
        return implode(" ",array_splice($words,0,$word_limit));
    }
?>

<div class="row">
    <div class="col-sm-9">	
		<!-- category wise news start -->
        <div class="row pr15">
            <div class="col-sm-12">
                <header>
					<h4 class="title-head">এই বিভাগের সকল খবর</h4>
				</header>
				<hr>
                <div class="row sp-top-row">
					<?php
						foreach ($all_news as $value) {
					?>
						<div class="col-sm-4">
							<a href="<?= base_url('News-Details/'.$value->news_id);?>">
								<img src="<?= base_url($value->image);?>" class="img-responsive" alt="<?= $value->news_headline; ?>" title="<?= $value->news_headline; ?>" style="height: 130px; width: 230px;"></a>
							<h2><a href="<?= base_url('News-Details/'.$value->news_id);?>"><?= $value->news_headline; ?></a></h2>
							<!-- <p><?php
                                    echo limit_words(strip_tags($value->news_description,'<p><em><a><br/><b><strong>'),10);
                                ?>
                            </p> -->
						</div>
					<?php } ?>
				</div>               
			</div>
			
			<div class="col-sm-12">
				<header>
					<h4 class="title-head">এই বিভাগের সর্বোচ্চ পঠিত</h4>
				</header>
				<hr>
			    <div class="row sp-top-row">
					<?php
						foreach ($popular_news as $value) {
					?>
						<div class="col-sm-4">
							<a href="<?= base_url('News-Details/'.$value->news_id);?>">
								<img src="<?= base_url($value->image);?>" class="img-responsive" alt="<?= $value->news_headline; ?>" title="<?= $value->news_headline; ?>" style="height: 140px; width: 240px;"></a>
							<h2><a href="<?= base_url('News-Details/'.$value->news_id);?>" title="<?= $value->news_headline; ?>"><?= $value->news_headline; ?></a></h2>
						</div>
					<?php } ?>
				</div>
			</div>

        </div>
        <!-- category wise news end --> 
    </div>               
			
	<!-- home sidebar start -->
	<?php include('inner_sidebar.php'); ?>
	<!-- //home sidebar start -->
</div>