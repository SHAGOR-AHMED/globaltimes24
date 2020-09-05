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
					<a href="" target="_blank" title="facebook"><span class="fa fa-facebook"></span></a>
					<a href="" target="_blank" title="twitter"><span class="fa fa-twitter"></span></a>
					<a href="" target="_blank" title="google plus"><span class="fa fa-google-plus"></span></a>
					<a href="" title="youtube"><span class="fa fa-youtube"></span></a>
					<a href="#" title="pinterest"><span class="fa fa-pinterest"></span></a>
					<a href="" title="RSS"><span class="fa fa-rss"></span></a>
				</div>
			</div>
		</div>
	</div>
	<!-- banner	 -->
	<div class="container banner-container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 banner">
				<a href="#"><img src="<?= base_url('assets/frontend/');?>multimedia/images/common/banner.png" class="img-responsive" alt="globaltimes24"></a>
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
						<li class="dropdown yamm-fw active"><a href="<?= base_url('welcome/');?>"><i class="fa fa-home"></i></a></li>
						<?php
							foreach ($all_category as $value) {
							$catID = $value->cat_id;
						?>
							
							<li class="dropdown yamm-fw">
								<a href="<?= base_url('Welcome/NewsByCatID/'.$catID);?>" class="dropdown-toggle all" id="country-news"><span class="hidden-sm hidden-md"><?= $value->category; ?> <b class="caret"></b></span><small class="visible-sm visible-md"><?= $value->category; ?> <b class="caret"></b></small></a>
								<ul class="dropdown-menu dropdown-menu-yamm hidden-xs">
									<li class="grid-demo">
										<div class="row DSubMenuRow">
											<div class="col-sm-2 col-first">
												<ul class="UlSubMenu">
													<?php
														$subcategory = $this->db->select('*')->from('subcategory')->where('subcat_catid',$catID)->get()->result();
															foreach($subcategory as $subcat){ ?>
															<li id="dhaka-news"><a href="<?= base_url('Welcome/NewsBySubID/'.$subcat->subcat_id);?>"><?= $subcat->subcategory; ?><i class="fa fa-angle-right fa-fw"></i></a></li>
													<?php } ?>
												</ul>
											</div>
											<div class="col-sm-10 Dcontent"><span class="contentArea"></span></div>
										</div>
									</li>
								</ul>
							</li>

						<?php } ?>
					</ul>
				</div>
			</div>
		</nav>
	</div>

	<!-- menu end -->


</header>