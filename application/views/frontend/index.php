
<!DOCTYPE html>
<html lang="bn">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php if(isset($title)){echo $title;}else{echo "Globaltimes24";}?></title>
		<meta name="description" content="24x7 Bangla Online news portal from Bangladesh />
		<meta http-equiv="refresh" content="600" />
		<meta name="robots" content="all" />
		<!-- facebook -->
		<!-- Pinterest -->
		<!-- Bootstrap,fontawesome Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link href="<?= base_url('assets/frontend/');?>common/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet">
		<!-- Menu Css -->
		<link href="<?= base_url('assets/frontend/');?>common/css/menu.css" rel="stylesheet">
		<!-- Camera Css -->
		<link rel='stylesheet' id='camera-css'  href='<?= base_url('assets/frontend/');?>common/camera-master/css/camera.css' type='text/css' media='all'>
		<!-- Custom Css -->
		<link href="<?= base_url('assets/frontend/');?>common/css/mainstyle.css" rel="stylesheet">
		<!-- menu -->
		<!-- <link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/menu/');?>css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/menu/');?>css/menu.css">
	    
		<script type="text/javascript" src="<?= base_url('assets/frontend/menu/');?>js/jquery.js"></script>
		<script type="text/javascript" src="<?= base_url('assets/frontend/menu/');?>js/function.js"></script> -->
		<!-- //menu -->
	</head>
	
	<body class="home-body">

		<?php include('page/header.php'); ?>

		<div class="container body-container">
			<div class="row headline-section">
				<div class="col-sm-12 headline-col">
					<span class="shironam pull-left hidden-xs">চলমান খবর</span>
					<div class='marquee-section'>
						<ul class="list-inline">
							<?php
								foreach ($all_newsheadline as $value) {
							?>
								<li>>><?= $value->news_headline; ?></a>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>	
			<!-- body -->
			<?php 
				if(isset($content)){
					echo $content;
				}else{
					echo "Found Nothing";
				}
			?>
			<!-- //body -->
			<!-- photo gallery row -->
			<?php include('page/gallery.php'); ?>
			<!-- /photo gallery row -->
			<!-- /video gallery row -->
			<?php //include('page/video.php'); ?>
			<!-- /video gallery row -->
		</div>

		<footer class="container footer bg-4">
			<div class="row">

				<div class="col-md-4 col-sm-6">
				  <div class="address">
					<h6 class="address-text">সম্পাদক: অ্যাডভোকেট সৈয়দ এন. আলম সিদ্দিকী</h6>
					<h6 class="address-text">© ২০১৬ সর্বস্বত্ব সংরক্ষিত, globaltimes24.com</h6>
					<a href="https://www.sonaliit.com/" target="_blank">Powered By: globaltimes24</a>
				  </div><!--/.address-->
				</div><!--/.col-sm-4-->


				<div class="col-md-4 col-sm-6">
				  <div class="btn-green">
					<a href="<?= base_url('welcome/'); ?>" class="">
					  <img src="<?= base_url('assets/img/xcd.png');?>" alt="logo" class="img-responsive">
					</a>
				  </div><!--/.btn-green-->
				</div>
				
				<div class="col-md-4 col-sm-6">
				   <div class="address">
					 <p style="color:#fff;margin-bottom:0;">সম্পাদকীয় ও বাণিজ্যিক কার্যালয়ঃ</p>
					 <p style="color:#fff;margin-bottom:0;">১৯/৩ কাকরাইল এরিয়া, রহমান লুসিড টাওয়ার, ফ্ল্যাট - C2, ঢাকা</p>
					 <p style="color:#fff;margin-bottom:0;"><strong>ফোন:</strong> +৮৮০১৭১১১৩৫৮৯৩</p>
					 <p style="color:#fff;margin-bottom:0;"><strong>Email:</strong> news.globaltimes24@gmail.com</p>
					 <p style="color:#fff;margin-bottom:0;">marketing.globaltimes24@gmail.com</p>
					 <p style="color:#fff;margin-bottom:0;">editorglobaltimes24@gmail.com</p>
				   </div><!--/.mail-intro-->
				</div><!--/.col-sm-4-->
			</div><!--/.row-->
		</footer><!--/.sonali bg-4-->
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Bootstrap Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- marquee js -->
		<script type="text/javascript" src="<?= base_url('assets/frontend/');?>common/js/jquery.marquee.min.js"></script>
		<script type='text/javascript' src='<?= base_url('assets/frontend/');?>common/camera-master/scripts/jquery.mobile.customized.min.js'></script>
		<script type='text/javascript' src='<?= base_url('assets/frontend/');?>common/camera-master/scripts/jquery.easing.1.3.js'></script>
		<script type='text/javascript' src='<?= base_url('assets/frontend/');?>common/camera-master/scripts/camera.min.js'></script>
		<!-- datepicker js -->
		<!-- <script src="BackEnd/common/plugins/datepicker/bootstrap-datepicker.js"></script> -->
		<!-- custom js -->
		<script type="text/javascript" src="<?= base_url('assets/frontend/');?>common/js/sonalinews.js"></script>
		<!-- <script> $('#ElectionCarousel').carousel('cycle') </script> -->
		<script type="text/javascript">
			//script for top news slider
			$(function(){
				$('#gallerySlider').camera();
				// $('#gallerySlider').camera({
				//     thumbnails: true
				// });
				// $('#gallerySlider').camera({
				//     height: '400px',
				//     loader: 'bar',
				//     pagination: false,
				//     thumbnails: true
				// });
			});
			// script for datepicker
			// $('.datepicker').datepicker({
			//     todayBtn: "linked",
			//     autoclose: true,
			//     todayHighlight: true
			// });
		</script>
	</body>
</html>
