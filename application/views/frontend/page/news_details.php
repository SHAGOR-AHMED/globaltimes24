<?php
	$short_desc=mb_substr($news_details->news_description,0,220,"UTF-8");
?>
<meta property="og:title" content="<?= $news_details->news_headline; ?>"/>
<meta property="og:description" content="<?php echo "$short_desc"; ?>"/>
<meta property="og:image" content="<?= $news_details->image; ?>" />
<meta property="og:site_name" content="globaltimes24.com/" />
<meta property="og:type" content="article" />
<meta property="og:locale" content="en_US" />
<link rel="canonical" href="<?php echo "http://". $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
<meta property="og:url" content="<?php echo "http://". $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" />
<meta property="article:author" content="http://www.globaltimes24.com/" />
<meta property="article:publisher" content="http://www.globaltimes24.com/" />

<div class="row">
	<div class="col-sm-9 detail-column">
		
		<div class="row">
			<div class="col-sm-12 single-content-heading">
				<h3></h3>
				<h1><?= $news_details->news_headline; ?></h1>
			</div>
			<div class="col-sm-6"> Reporter |  <b><?= $news_details->post_by; ?></b> </div>
			<div class="col-sm-6">
				<div class="pull-right">
					<div class="pull-left hidden-xs">
						<div style="float:right" class="addthis_toolbox addthis_default_style"> 
							<a class="addthis_button_preferred_1"></a> <a class="addthis_button_preferred_2"></a> 
							<a class="addthis_button_preferred_3"></a> <a class="addthis_button_preferred_4"></a> 
							<a class="addthis_button_compact"></a> <a class="addthis_counter addthis_bubble_style"></a> 
						</div> 
					</div>

					<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f6e2c8770b33edd"></script>
    
   					<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f6e2c8770b33edd"></script>
				</div>
			</div>
			
			<div class="col-sm-12">
				<span class="hidden-xs">Published on:&nbsp;
					<?php
						$timezone = "Asia/Dhaka";
						date_default_timezone_set($timezone);

						$dt = new DateTime($news_details->date);
						echo $dt->format('M j Y g:i A');
					?>
				</span>
			</div>
			<div class="col-sm-12"><hr></div>
			<div class="col-sm-12 single-content-details">
				<div class="img-box  mb10">
					<img src="<?= base_url($news_details->image);?>" class="img-responsive" alt="<?= $news_details->news_headline; ?>" title="<?= $news_details->news_headline; ?>">
				</div>
				<p style="text-align: justify; font-size:14px !important;"><?= $news_details->news_description; ?></p>
				<hr />                             
			</div>
	    </div>

		<div class="row">
			<div class="col-sm-12">
				<header>
					<h4 class="title-head">এই বিভাগের শীর্ষ খবর</h4>
				</header>
			</div>
			<div class="col-sm-12 most-popular-section">
				<div class="row mt15">
					<?php
						foreach ($popular_news as $value) {
					?>
						<div class="col-sm-4">
							<a href="<?= base_url('News-Details/'.$value->news_id);?>">
								<img src="<?= base_url($value->image);?>" class="img-responsive" style="height: 140px; width: 240px;">
							</a>
							<h2><a href="<?= base_url('News-Details/'.$value->news_id);?>"><?= $value->news_headline; ?></a></h2>
						</div>
					<?php } ?>	
				</div>
			</div>
		</div>
	</div>
    <?php include('inner_sidebar.php'); ?>
</div>