<a
	href="<?php echo site_url('admin/utility_schedulebasemodel/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Utility_schedulebasemodel'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/utility_schedulebasemodel/save/'.$utility_schedulebasemodel['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Subject" class="col-md-4 control-label">Subject</label>
			<div class="col-md-8">
				<input type="text" name="subject"
					value="<?php echo ($this->input->post('subject') ? $this->input->post('subject') : $utility_schedulebasemodel['subject']); ?>"
					class="form-control" id="subject" />
			</div>
		</div>
		<div class="form-group">
			<label for="Description" class="col-md-4 control-label">Description</label>
			<div class="col-md-8">
				<input type="text" name="description"
					value="<?php echo ($this->input->post('description') ? $this->input->post('description') : $utility_schedulebasemodel['description']); ?>"
					class="form-control" id="description" />
			</div>
		</div>
		<div class="form-group">
			<label for="Date From" class="col-md-4 control-label">Date From</label>
			<div class="col-md-8">
				<input type="text" name="date_from" id="date_from"
					value="<?php echo ($this->input->post('date_from') ? $this->input->post('date_from') : $utility_schedulebasemodel['date_from']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="Time From" class="col-md-4 control-label">Time From</label>
			<div class="col-md-8">
				<input type="text" name="time_from"
					value="<?php echo ($this->input->post('time_from') ? $this->input->post('time_from') : $utility_schedulebasemodel['time_from']); ?>"
					class="form-control" id="time_from" />
			</div>
		</div>
		<div class="form-group">
			<label for="Date To" class="col-md-4 control-label">Date To</label>
			<div class="col-md-8">
				<input type="text" name="date_to" id="date_to"
					value="<?php echo ($this->input->post('date_to') ? $this->input->post('date_to') : $utility_schedulebasemodel['date_to']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="Time To" class="col-md-4 control-label">Time To</label>
			<div class="col-md-8">
				<input type="text" name="time_to"
					value="<?php echo ($this->input->post('time_to') ? $this->input->post('time_to') : $utility_schedulebasemodel['time_to']); ?>"
					class="form-control" id="time_to" />
			</div>
		</div>

	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success"><?php if(empty($utility_schedulebasemodel['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
