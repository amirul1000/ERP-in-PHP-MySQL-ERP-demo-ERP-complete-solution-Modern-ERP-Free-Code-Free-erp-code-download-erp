<a href="<?php echo site_url('member/channel/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Channel'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('member/channel/save/'.$channel['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">

		<div class="form-group">
			<label for="Channel Name" class="col-md-4 control-label">Channel Name</label>
			<div class="col-md-8">
				<input type="text" name="channel_name"
					value="<?php echo ($this->input->post('channel_name') ? $this->input->post('channel_name') : $channel['channel_name']); ?>"
					class="form-control" id="channel_name" />
			</div>
		</div>
		<div class="form-group">
			<label for="File Bannar" class="col-md-4 control-label">File Bannar</label>
			<div class="col-md-8">
				<input type="file" name="file_bannar" id="file_bannar"
					value="<?php echo ($this->input->post('file_bannar') ? $this->input->post('file_bannar') : $channel['file_bannar']); ?>"
					class="form-control-file" />
			</div>
		</div>
		<div class="form-group">
			<label for="About" class="col-md-4 control-label">About</label>
			<div class="col-md-8">
				<textarea name="about" id="about" class="form-control" rows="4" /><?php echo ($this->input->post('about') ? $this->input->post('about') : $channel['about']); ?></textarea>
			</div>
		</div>

	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success"><?php if(empty($channel['id'])){?>Save<?php }else{?>Update<?php } ?></button>
	</div>
</div>
<?php echo form_close(); ?>
<!--End of Form to save data//-->
<!--JQuery-->
<script>
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd", 
		changeYear: true,
		changeMonth: true,
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: '<?php echo base_url(); ?>public/datepicker/images/calendar.gif',
	});
</script>
