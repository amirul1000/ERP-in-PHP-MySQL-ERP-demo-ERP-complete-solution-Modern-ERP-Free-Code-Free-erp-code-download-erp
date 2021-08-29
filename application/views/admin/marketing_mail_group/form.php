<a href="<?php echo site_url('admin/marketing_mail_group/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Marketing_mail_group'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/marketing_mail_group/save/'.$marketing_mail_group['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Group Name" class="col-md-4 control-label">Group Name</label>
			<div class="col-md-8">
				<input type="text" name="group_name"
					value="<?php echo ($this->input->post('group_name') ? $this->input->post('group_name') : $marketing_mail_group['group_name']); ?>"
					class="form-control" id="group_name" />
			</div>
		</div>

	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success"><?php if(empty($marketing_mail_group['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
