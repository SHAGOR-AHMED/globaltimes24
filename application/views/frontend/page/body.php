
<?php
    function limit_words($string, $word_limit){
        $words = explode(" ",$string);
        return implode(" ",array_splice($words,0,$word_limit));
    }

	$middleads1 = $this->db->select('*')->from('tbl_ads')->where('category', 1)->where('position', 1)->get()->row();
	$middleads2 = $this->db->select('*')->from('tbl_ads')->where('category', 1)->where('position', 2)->get()->row();
	$middleads3 = $this->db->select('*')->from('tbl_ads')->where('category', 1)->where('position', 3)->get()->row();
?>

<div class="row">
    <div class="col-sm-9">
		<!-- top news start-->
        <div class="row pr15">
			<?php
				foreach ($focus_news as $value) {
			?>
				<div class="col-sm-7 sp-top-left-column">
					<a href="<?= base_url('News-Details/'.$value->news_id);?>" title="<?= $value->news_headline; ?>">
						<img src="<?= base_url($value->image);?>" class="img-responsive center-block"  title="<?= $value->news_headline; ?>">
					</a>
					<h2><a href="<?= base_url('News-Details/'.$value->news_id);?>" title="<?= $value->news_headline; ?>"><?= $value->news_headline; ?></a></h2>
					<p style="text-align: justify;"><?= $value->news_headline; ?></p>
				</div>  
			<?php } ?>
            
			<div class="col-sm-5 sp-top-right-column">
                <div class="row">
                    <div class="col-sm-12">
						<?php
                            foreach ($top_news as $value) {
                        ?>
							<div class="row sp-top-right-column-row">
								<div class="col-sm-4 sp-top-img-column">
									<a href="<?= base_url('News-Details/'.$value->news_id);?>" title=""><img src="<?= base_url($value->image);?>" class="img-responsive"  alt="<?= $value->news_headline; ?>" title="<?= $value->news_headline; ?>">
									</a>
								</div>
								<div class="col-sm-8">
									<h2><a href="<?= base_url('News-Details/'.$value->news_id);?>" title="<?= $value->news_headline; ?>"><?= $value->news_headline; ?></a></h2>
								</div>
							</div>
						<?php } ?>
					</div>
                </div>
            </div>
        </div>
		<!-- top news end-->
		
		<!-- ads start -->
		<div class="row pr15" style="margin-top:10px;margin-bottom:25px;">
			<div class="col-sm-12">
			  <img src="<?= base_url($middleads1->image);?>" class="img-responsive hidden-xs" alt="" title="">
			</div>
		</div>
		<!-- ads end -->
		
		<!-- recent news start -->
        <div class="row pr15">
            <div class="col-sm-12">
                <header>
					<h4 class="title-head">গ্লোবাল নিউজ</h4>
				</header>
                <div class="row sp-top-row">
					<?php
						foreach ($global_news as $value) {
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
		<!-- recent news end -->
			
		<!-- selected start -->
        <div class="row pr15">
            <div class="col-sm-12">
                <header>
					<h4 class="title-head">সবখবর</h4>
				</header>
                <div class="row sp-top-row">
					<?php
						foreach ($random_news as $value) {
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
        <!-- selected end -->
			
		<!-- advertisement start -->
		<div class="row pr15">
			<div class="col-sm-12 mtb15">
			  <a href="<?= $middleads2->link; ?>" target="_blank">
				<img src="<?= base_url($middleads2->image);?>" alt="University" class="img-responsive center-block"/>
			  </a>
			</div>
		</div>
		<!-- advertisement end -->
		
		<!-- jatio & rajnity -->
		<div class="row pr15">
			<!-- Jatio start-->
			<div class="col-sm-6">
				<header>
					<h4 class="title-head">জাতীয়</h4>
				</header>
				<?php
					$count=0;
					foreach ($national_news as $value) {
					$count++;
					if($count==1){ 
				?>
					<div class="col-sm-12 home-cat-top">
						<a href="<?= base_url('News-Details/'.$value->news_id);?>" title="<?= $value->news_headline; ?>"><img src="<?= base_url($value->image);?>" class="img-responsive" alt="" title=""></a>
						<h2><a href="<?= base_url('News-Details/'.$value->news_id);?>"><?= $value->news_headline; ?></a></h2>
					</div>
					<?php }else{ ?>
			  
					<div class="col-sm-12 home-cat-bottom-items">
						<div class="col-sm-4 pl0">
							<a href="<?= base_url('News-Details/'.$value->news_id);?>" title="<?= $value->news_headline; ?>">
								<img src="<?= base_url($value->image);?>" class="img-responsive" alt="<?= $value->news_headline; ?>" title="<?= $value->news_headline; ?>">
							</a>
						</div>
						<div class="col-sm-8 pl0">
							<h2><a href="<?= base_url('News-Details/'.$value->news_id);?>" title="<?= $value->news_headline; ?>"><?= $value->news_headline; ?></a></h2>
						</div>
					</div>
				<?php } } ?>
			</div>
			<!--Jatio end-->

			<!-- Rajniti start-->
			<div class="col-sm-6">
				<header>
					<h4 class="title-head">রাজনীতি</h4>
				</header>
				<?php
					$count=0;
					foreach ($political_news as $value) {
					$count++;
					if($count==1){ 
				?>
					<div class="col-sm-12 home-cat-top">
						<a href="<?= base_url('News-Details/'.$value->news_id);?>" title="<?= $value->news_headline; ?>"><img src="<?= base_url($value->image);?>" class="img-responsive" alt="" title=""></a>
						<h2><a href="<?= base_url('News-Details/'.$value->news_id);?>"><?= $value->news_headline; ?></a></h2>
					</div>
					<?php }else{ ?>
			  
					<div class="col-sm-12 home-cat-bottom-items">
						<div class="col-sm-4 pl0">
							<a href="<?= base_url('News-Details/'.$value->news_id);?>" title="<?= $value->news_headline; ?>">
								<img src="<?= base_url($value->image);?>" class="img-responsive" alt="<?= $value->news_headline; ?>" title="<?= $value->news_headline; ?>">
							</a>
						</div>
						<div class="col-sm-8 pl0">
							<h2><a href="<?= base_url('News-Details/'.$value->news_id);?>" title="<?= $value->news_headline; ?>"><?= $value->news_headline; ?></a></h2>
						</div>
					</div>
				<?php } } ?>
			</div>
			<!-- Rajniti end-->
		</div>
		<!-- jatio & rajnity end-->
			
		<!-- advertisement start -->
		<div class="row pr15">
			<div class="col-sm-12 mtb15">
				<a href="<?= $middleads3->link; ?>" target="_blank"><img src="<?= base_url($middleads3->image);?>" alt="ads" class="img-responsive center-block"/></a>
			</div>
		</div>
		<!-- advertisement end -->
			
		<!-- sports starts-->
		<div class="row pr15">
			<div class="col-sm-12">
				<header>
					<h4 class="title-head">খেলাধূলা</h4>
				</header>
				<div class="row sp-top-row">
					<?php
						foreach ($sports_news as $value) {
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
		<!-- sport end -->
           
		<!-- advertisement start -->
		<div class="row pr15">
			<div class="col-sm-12 mtb15">
				<a href="<?= $middleads1->link; ?>" target="_blank"><img src="<?= base_url($middleads1->image);?>" alt="Galaxy" class="img-responsive center-block"/></a>
			</div>
		</div>
		<!-- advertisement end -->
			 
    </div>
		
	<!-- home sidebar start -->
	<?php include('home_sidebar.php'); ?>
	<!-- //home sidebar start -->
        
</div>