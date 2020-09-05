
<?php
	$ads1 = $this->db->select('*')->from('tbl_ads')->where('category', 2)->where('position', 1)->get()->row();
	$ads2 = $this->db->select('*')->from('tbl_ads')->where('category', 2)->where('position', 2)->get()->row();
	$ads3 = $this->db->select('*')->from('tbl_ads')->where('category', 2)->where('position', 3)->get()->row();
?>

<div class="col-sm-3 home-sidebar">
	<!-- latest and popular start -->
	<div class="col-sm-12" id="latest-news-tab">
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#latest" aria-controls="latest" role="tab" data-toggle="tab">সর্বশেষ</a></li>
			<li role="presentation"><a href="#readers-choice" aria-controls="readers-choice" role="tab" data-toggle="tab">শীর্ষ খবর</a></li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="latest">
				<ul>
					<?php
						foreach ($sidebar_recent_news as $value) {
					?>
						<li>
							<a href="<?= base_url('News-Details/'.$value->news_id);?>" title="<?= $value->news_headline?>"><?= $value->news_headline?></a>
						</li>
					<?php } ?>
				</ul>	
			</div>  
			
			<div role="tabpanel" class="tab-pane" id="readers-choice">
				<ul>
					<?php
						foreach ($popular_news as $value) {
					?>
						<li>
							<a href="<?= base_url('News-Details/'.$value->news_id);?>" title="<?= $value->news_headline?>"><?= $value->news_headline?></a>
						</li>
					<?php } ?>
				</ul>
			</div>                
		</div>
	</div>
	<!-- latest and popular end -->

	<!-- add start-->
	<div class="col-sm-12 mt15">
	  <div class="row">
		<img src="<?= base_url($ads1->image);?>" class="img-responsive center-block" alt="ad" title="Addvertisement"/>
	  </div>
	  <br>
	</div>
	<!-- add end-->
	<!-- advertisement start-->
	<div class="row right-panel">
		<div class="col-sm-12">
			<a href="<?= $ads2->link; ?>" target="_blank">
				<img src="<?= base_url($ads2->image);?>" class="img-responsive center-block" alt="Potato" title="s"/>
			</a>
		</div>
	</div>
	<!-- advertisement end-->

	<!-- lifestyle start -->
	<div class="col-sm-12 right-panel">
		<div class="panel panel-default">
			<div class="panel-heading">
				<header>
					<h4 class="title-head text-center">লাইফস্টাইল </h4>
				</header>
			</div>
			<?php
				$count=0;
				foreach ($life_style as $value) {
				$count++;
				if($count==1){ 
			?>
			<div class="panel-body">
				<img src="<?= base_url($value->image);?>" alt="" class="img-responsive center-block"/>
				<h3><a href="<?= base_url('News-Details/'.$value->news_id);?>"><?= $value->news_headline; ?></a></h3>
				<p style="text-align: justify;"><?= $value->news_headline; ?></p>
			</div>

			<?php }else{ ?>
			  
				<ul class="list-group">
					<li class="list-group-item">
						<a href="<?= base_url('News-Details/'.$value->news_id);?>"><?= $value->news_headline; ?></a>
					</li>
				</ul>

			<?php } } ?>
			               
		</div>
	</div>
	<!-- lifestyle end -->
	
	<!-- add start-->
	<div class="col-sm-12 mt15">
	  <div class="row">
		<img src="<?= base_url($ads3->image);?>" class="img-responsive center-block" alt="ad" title="Addvertisement"/>
	  </div>
	</div>
	<!-- add end-->

	<!-- facebook start -->
	<div class="col-sm-12 right-panel">
		<div class="panel panel-default">
			<div class="panel-heading">
				<header>
					<h4 class="title-head text-center">ফেইসবুক পেইজ</h4>
				</header>
			</div>
			<div class="panel-body">
				<div class="fb-page" data-href="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
					<div class="fb-xfbml-parse">
						<div id="fb-root"></div>
						<script>(function(d, s, id) {
							var js, fjs = d.getElementsByTagName(s)[0];
							if (d.getElementById(id)) return;
								js = d.createElement(s); js.id = id;
								js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2';
								fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));
						</script>
						<center>
							<div class="fb-page" data-href="https://www.facebook.com/globaltimes24/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"
							style="border:1px solid #e2e2e2; border-radius: 5px; padding:5px;">
								<blockquote cite="https://www.facebook.com/globaltimes24/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/globaltimes24/">globaltimes24.com</a></blockquote>
							</div>
						</center>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- facebook end -->

	<!-- namaz start -->
	<div class="col-sm-12 right-panel">
		<div class="panel panel-default">
			<div class="panel-heading">
				<header>
					<h4 class="title-head text-center">নামাযের সময় সুচি</h4>
				</header>
			</div>
			<div class="panel-body">
				
				<table class="table table-striped">
					<thead>
						<tr>
						  <th>ওয়াক্ত</th>
						  <th>শুরু</th>
						  <th>জামাত</th>
						</tr>
					</thead>
					<tbody>
						<?php
							date_default_timezone_set('UTC');
							date_default_timezone_set('Asia/Dhaka');
							$namaj = $this->db->select('*')->from('namaz_settings')->get()->result(); 
							foreach ($namaj as $value) {
						?>
						<tr>
						  <td><?php echo $value->name; ?></td>
						  <td><?php echo date("h:i A",strtotime($value->start_time)); ?></td>
						  <td><?php echo date("h:i A",strtotime($value->end_time)); ?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>                    
			</div>
		</div>
	</div>
</div>