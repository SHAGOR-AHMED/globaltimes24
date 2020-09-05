<div class="row">
	<div class="col-sm-12">
		<header>
			<h4 class="title-head">ভিডিও গ্যালারি</h4>
		</header>
	</div>
	<?php
		$vdoAds = $this->db->select('*')->from('tbl_video')->limit(4)->get()->result();
		foreach ($vdoAds as $value) { ?>
		<div class="col-xs-6 col-sm-3 sm-gallery-pos">
			<iframe width="100%" src="https://www.youtube.com/embed/<?= $value->link; ?>" frameborder="0" allowfullscreen></iframe>
		</div>
	<?php } ?>
</div>