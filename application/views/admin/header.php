<!DOCTYPE html>
<html lang="zxx">
	<head>
		<title>globaltimes24 | Control Panel</title>
		<!-- custom-theme -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="application/x-javascript">addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
				function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- //custom-theme -->
		<link href="<?php print base_url();?>assets/admin/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php print base_url();?>assets/admin/css/component.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php print base_url();?>assets/admin/css/export.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php print base_url();?>assets/admin/css/flipclock.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php print base_url();?>assets/admin/css/circles.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php print base_url();?>assets/admin/css/style_grid.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php print base_url();?>assets/admin/css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php print base_url();?>assets/admin/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="<?php echo base_url()?>assets/admin/css/modal.css" >
		<!-- font-awesome-icons -->
		<link href="<?php print base_url();?>assets/admin/css/font-awesome.css" rel="stylesheet"> 
		<!-- //font-awesome-icons -->
		<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">

	</head>

	<body>

	<div class="wthree_agile_admin_info">
			  
		<div class="w3_agileits_top_nav">
			<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><i class="fa fa-bars" aria-hidden="true"></i><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller scrollbar1">
							<?php 
								$UserType = $this->session->userdata('user_type');
								if($UserType == 1){ ?>

									<ul class="gn-menu agile_menu_drop">
										<li>
											<a href="<?php print base_url('master');?>"> <i class="fa fa-tachometer"></i> Dashboard</a>
										</li>

										<li>
											<a href="<?php print base_url('User/');?>"> <i class="fa fa-tachometer"></i> Manage User</a>
										</li>	

										<li>
											<a href="<?php print base_url('Super_admin/slider');?>"> <i class="fa fa-tachometer"></i> Slider</a>
										</li>	

										<li>
											<a href="<?php print base_url('Ads/')?>"> <i class="fa fa-tachometer"></i> Manage Ads</a>
										</li>

										<li>
											<a href="<?php print base_url('Ads/Video')?>"> <i class="fa fa-tachometer"></i> Manage Video Ads</a>
										</li>	

										<li>
											<a href="<?php print base_url('Category/');?>"> <i class="fa fa-tachometer"></i> News Category</a>
										</li>

										<li>
											<a href="<?php print base_url('Category/subcategory');?>"> <i class="fa fa-table"></i> News Subcategory</a>
										</li>

										<li>
											<a href="<?php print base_url('News/NewsHeadline')?>"> <i class="fa fa-tachometer"></i> Heading News</a>
										</li>

										<li>
											<a href="<?php print base_url('News/')?>"> <i class="fa fa-tachometer"></i> Manage News</a>
										</li>

										<li>
											<a href="<?php print base_url('Ads/NamazTime')?>"> <i class="fa fa-tachometer"></i> Update Namaz Time</a>
										</li>

									</ul>

							<?php } elseif($UserType == 2){ ?>

									<ul class="gn-menu agile_menu_drop">
										<li>
											<a href="<?php print base_url('master');?>"> <i class="fa fa-tachometer"></i> Dashboard</a>
										</li>

										<li>
											<a href="<?php print base_url('News/NewsHeadline')?>"> <i class="fa fa-tachometer"></i> Heading News</a>
										</li>

										<li>
											<a href="<?php print base_url('News/')?>"> <i class="fa fa-tachometer"></i> Manage News</a>
										</li>

									</ul>

							<?php }elseif($UserType == 3){ ?>

									<ul class="gn-menu agile_menu_drop">
										<li>
											<a href="<?php print base_url('master');?>"> <i class="fa fa-tachometer"></i> Dashboard</a>
										</li>

										<li>
											<a href="<?php print base_url('News/NewsHeadline')?>"> <i class="fa fa-tachometer"></i> Heading News</a>
										</li>

										<li>
											<a href="<?php print base_url('News/')?>"> <i class="fa fa-tachometer"></i> Manage News</a>
										</li>

									</ul>

							<?php } ?>
							
						</div>
					</nav>
				</li>

				<li class="second logo">
					<h1><i class="fa fa-graduation-cap" aria-hidden="true"></i>globaltimes24</h1>
				</li>

				<li class="second admin-pic">
			       <ul class="top_dp_agile">
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div style="position: relative;top: 18px;">	
									Hello <b><?php echo $this->session->userdata('full_name'); ?></b>
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="<?php print base_url('ChangePassword');?>"><i class="fa fa-user"></i> Change Password</a> </li> 
								<li> <a href="<?php print base_url('logout');?>"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>	
					</ul>
			    </li>

				<li class="second full-screen">
					<section class="full-top">
						<button id="toggle"><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
					</section>
				</li>

			</ul>
		</div>