<header>
	<div class="container-fluid top-bar">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 top-date">
					<span>
						<?php
							$this->load->view('frontend/dateInfo/date_conv_bangla.php');
							$this->load->view('frontend/dateInfo/banglaDate.php');
						?>
					</span>
				</div>
				<div class="col-xs-4 col-sm-2 temperature">
				</div>
				<div class="col-xs-8 col-sm-4 text-right top-social-icons">
					<a href="https://www.facebook.com/globaltimes24/" target="_blank" title="facebook"><span class="fa fa-facebook"></span></a>
					<a href="" target="_blank" title="twitter"><span class="fa fa-twitter"></span></a>
					<a href="" target="_blank" title="google plus"><span class="fa fa-google-plus"></span></a>
					<a href="" title="youtube"><span class="fa fa-youtube"></span></a>
				</div>
			</div>
		</div>
	</div>
	<!-- banner	 -->
	<div class="container banner-container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 banner">
				<a href="<?= base_url('Home');?>"><img src="<?= base_url('assets/frontend/');?>multimedia/images/common/banner.png" class="img-responsive" alt="globaltimes24"></a>
			</div>
		</div>
	</div>

	<!-- menu -->
	<div class="container menu-container">
		<nav class="navbar yamm navbar-default">
			<div class="menuContainer">
				<div class="navbar-header visible-xs">
					<button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div id="navbar-collapse-1" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="dropdown yamm-fw active">
							<a href="<?= base_url('Home');?>"><i class="fa fa-home"></i></a>
						</li>
						<?php
							foreach ($all_category as $value) {
							$catID = $value->cat_id;
						?>
						<li class="dropdown yamm-fw "><a href="<?= base_url('News-By-Category/'.$catID);?>"><?= $value->category; ?></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</nav>
	</div>
	<!-- menu end -->

</header>