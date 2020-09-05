<div class="row">
	<div class="col-sm-12">
		<header>
			<h4 class="title-head">ফটো এবং ভিডিও গ্যালারি</h4>
		</header>
	</div>
	
	<div class="col-sm-8 mt15">
		<div class="camera_wrap camera_azure_skin" id="gallerySlider">
			<div data-thumb="<?= base_url('assets/frontend/multimedia/images/gallery/s1.jpg');?>" data-src="<?= base_url('assets/frontend/multimedia/images/gallery/s1.jpg');?>">
				<div class="camera_caption fadeFromBottom">
					লোটাস এর সদস্যদের জন্য কিস্তিতে বাইক দিবে সুজুকি
				</div>
			</div>

			<div data-thumb="<?= base_url('assets/frontend/multimedia/images/gallery/s2.jpg');?>" data-src="<?= base_url('assets/frontend/multimedia/images/gallery/s2.jpg');?>">
				<div class="camera_caption fadeFromBottom">
					লোটাস এর সদস্যদের জন্য কিস্তিতে বাইক দিবে সুজুকি
				</div>
			</div>

			<div data-thumb="<?= base_url('assets/frontend/multimedia/images/gallery/s3.jpg');?>" data-src="<?= base_url('assets/frontend/multimedia/images/gallery/s3.jpg');?>">
				<div class="camera_caption fadeFromBottom">
					লোটাস এর সদস্যদের জন্য কিস্তিতে বাইক দিবে সুজুকি
				</div>
			</div>

		</div>
	</div>

	<div class="col-sm-4 sm-gallery-pos">
		<?php
			$vdoAds = $this->db->select('*')->from('tbl_video')->limit(4)->get()->result();
			foreach ($vdoAds as $value) { ?>
			<div>
				<iframe width="100%" height="350px" src="https://www.youtube.com/embed/<?= $value->link; ?>" frameborder="0" allowfullscreen></iframe>
			</div>
		<?php } ?>
	</div>
</div>