<!DOCTYPE html>
<html>
	<head>
		<title><?php if(isset($title)){echo $title;}else{echo "Globaltimes24";}?></title>
		<link href="<?= base_url('assets/frontend/');?>css/bootstrap.css" rel='stylesheet' type='text/css' />
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="<?= base_url('assets/frontend/');?>js/jquery.min.js"></script>
		<!-- Custom Theme files -->
		<link href="<?= base_url('assets/frontend/');?>css/style.css" rel="stylesheet" type="text/css" media="all" />
		<!-- Custom Theme files -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Express News" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- for bootstrap working -->
		<script type="text/javascript" src="<?= base_url('assets/frontend/');?>js/bootstrap.js"></script>
		<!-- //for bootstrap working -->
		<!-- web-fonts -->
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
		<link href='//fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
		<!-- menu -->
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/menu/');?>css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/menu/');?>css/menu.css">
	    
		<script type="text/javascript" src="<?= base_url('assets/frontend/menu/');?>js/jquery.js"></script>
		<script type="text/javascript" src="<?= base_url('assets/frontend/menu/');?>js/function.js"></script>
		<!-- //menu -->
		<script src="<?= base_url('assets/frontend/');?>js/responsiveslides.min.js"></script>
		<script>
			$(function () {
			  $("#slider").responsiveSlides({
				auto: true,
				nav: true,
				speed: 500,
				namespace: "callbacks",
				pager: true,
			  });
			});
		</script>
		<script type="text/javascript" src="<?= base_url('assets/frontend/');?>js/move-top.js"></script>
		<script type="text/javascript" src="<?= base_url('assets/frontend/');?>js/easing.js"></script>
		<!--/script-->
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
		</script>
		<!--  -->
	</head>
	
	<body>
		<!-- header-section-starts-here -->
		<div class="header">
			<div class="header-top">
				<div class="wrap">
					<div class="top-menu">
						<p>
							<?php
								include("dateInfo/date_conv_bangla.php");
								include("dateInfo/banglaDate.php");
							?>
						</p>
					</div>
					<div class="num">
						<p>Sign in / Join</p>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- <div class="row">
				<div class="col-md-12">
					<div class="logo text-center">
						<a href="#"><img src="<?= base_url('assets/frontend/');?>images/banner.png" alt="" /></a>
					</div>
				</div>
			</div> -->
			<div class="header-bottom">
				<div class="logo text-center">
					<a href="#"><img src="<?= base_url('assets/frontend/');?>images/banner.png" alt="" /></a>
				</div>
				<?php include('page/menu.php');?>
			</div>
		</div>
		<!-- header-section-ends-here -->
		<div class="wrap">
			<div class="move-text">
				<div class="breaking_news">
					<h2>চলমান খবর</h2>
				</div>
				<div class="marquee">
					<?php
                        foreach ($all_newsheadline as $value) {
                    ?>
					<div class="marquee1"><a class="breaking" href="#">>><?= $value->news_headline; ?></a></div>
					<?php } ?>
					
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
				<script type="text/javascript" src="<?= base_url('assets/frontend/');?>js/jquery.marquee.min.js"></script>
				<script>
				  $('.marquee').marquee({ pauseOnHover: true });
				  //@ sourceURL=pen.js
				</script>
			</div>
		</div>
		<!-- content-section-starts-here -->
		<?php 
			if(isset($content)){
			  echo $content;
			}else{
				echo "Found Nothing";
			}
		?>
		<!-- content-section-ends-here -->
		<!-- footer-section-starts-here -->
		<div class="footer">
			<div class="footer-top">
				<div class="wrap">
					
					<div class="col-md-4 col-xs-6 col-sm-6 footer-grid">
						<p style="position: relative;top: 60px;"><a href="#"><img src="<?= base_url('assets/frontend/');?>images/xcd.png"></a></p>
					</div>

					<div class="col-md-5 col-xs-6 col-sm-4 footer-grid">
						<p>সম্পাদক: অ্যাডভোকেট সৈয়দ এন. আলম সিদ্দিকী </p>
						<p>© ২০১৬ সর্বস্বত্ব সংরক্ষিত, globaltimes24.com</p>
						<p>সম্পাদকীয় ও বাণিজ্যিক কার্যালয়ঃ ৩৫ পুরানা পল্টন লেন, ভি আই পি রোড, ঢাকা-১০০০। </p>
						<br>
						<p>গ্লোবাল টাইমস এ প্রকাশিত/প্রচারিত সংবাদ, আলোকচিত্র, ভিডিওচিত্র, <br>অডিও বিনা অনুমতিতে ব্যবহার করা বেআইনি </p>
					</div>
					
					<div class="col-md-3 col-xs-12 footer-grid">
						<address>
							<ul class="location">
								<li><span class="glyphicon glyphicon-earphone"></span></li>
								<li>+৮৮০১৭১১১৩৫৮৯৩</li>
								<div class="clearfix"></div>
							</ul>	
							<ul class="location">
								<li><span class="glyphicon glyphicon-earphone"></span></li>
								<li>+৮৮০২৯৩৫৫৬৬৭</li>
								<div class="clearfix"></div>
							</ul>	
							<ul class="location">
								<li><span class="glyphicon glyphicon-envelope"></span></li>
								<li><a href="mailto:news.globaltimes24@gmail.com">news.globaltimes24@gmail.com</a></li>
								<li><a href="mailto:marketing.globaltimes24@gmail.com">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;marketing.globaltimes24@gmail.com</a></li>
								<li><a href="mailto:editorglobaltimes24@gmail.com">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;editorglobaltimes24@gmail.com</a></li>
								<div class="clearfix"></div>
							</ul>						
						</address>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="wrap">
					<div class="copyrights col-md-6">
						<p> © 2019 Global Times 24 | All Rights Reserved</p>
					</div>
					<div class="footer-social-icons col-md-6">
						<ul>
							<li><a class="facebook" href="#"></a></li>
							<li><a class="twitter" href="#"></a></li>
							<li><a class="flickr" href="#"></a></li>
							<li><a class="googleplus" href="#"></a></li>
							<li><a class="dribbble" href="#"></a></li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!-- footer-section-ends-here -->
		<script type="text/javascript">
			$(document).ready(function() {
				/*
					var defaults = {
					wrapID: 'toTop', // fading element id
					wrapHoverID: 'toTopHover', // fading element hover id
					scrollSpeed: 1200,
					easingType: 'linear' 
					};
				*/
				$().UItoTop({ easingType: 'easeOutQuart' });
			});
		</script>
		<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	</body>
</html>