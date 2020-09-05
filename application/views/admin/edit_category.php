<?php include('header.php'); ?>
<div class="inner_content">
	<div class="inner_content_w3_agile_info">
		<div class="agile_top_w3_grids">
			<div class="block-content collapse in">
				<div class="span12">
					<form action="<?php echo base_url('category/update_category');?>" enctype="multipart/form-data" method="post">
						<div class="control-group">
						  <label class="control-label" for="userfile">Category Name</label>
						   <input type="hidden" name="id" value="<?php print $result->cat_id;?>" class="form-control">
						  <div class="controls">
							<input type="text" name="category" value="<?php print $result->category;?>" class="form-control" required>
						  </div>
						</div><br>
						<br>
						<div class="form-actions">
						  <button type="submit" name="submit" class="btn btn-primary">Save Change</button>
						</div>
					</form>
				</div>
			</div>   
		</div>							
	</div>
</div>
<?php include('footer.php'); ?>