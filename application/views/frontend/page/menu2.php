<div id="wrap">
	<header>
		<div class="inner relative">
			<a id="menu-toggle" class="button dark" href="#"><i class="icon-reorder"></i></a>
			<nav id="navigation">
				<ul id="main-menu">
					<li class="current-menu-item"><a href="<?= base_url('welcome/');?>"><i class="fa fa-home"></i></a></li>
					<?php
						foreach ($all_category as $value) {
						$catID = $value->cat_id;
					?>
						<li class="parent">
							<a href="<?= base_url('Welcome/NewsByCatID/'.$value->cat_id);?>"><?= $value->category; ?></a>
							<ul class="sub-menu">
								<?php
									$subcategory = $this->db->select('*')->from('subcategory')->where('subcat_catid',$catID)->get()->result();
									foreach($subcategory as $subcat){ ?>
										<li><a href="<?= base_url('Welcome/NewsBySubID/'.$subcat->subcat_id);?>"><?= $subcat->subcategory; ?></a></li>
								<?php } ?>
							</ul>
						</li>
					<?php } ?>
				</ul>
			</nav>
			<div class="clear"></div>
		</div>
	</header>	
</div> 