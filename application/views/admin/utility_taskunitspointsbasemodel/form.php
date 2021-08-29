<a
	href="<?php echo site_url('admin/utility_taskunitspointsbasemodel/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Utility_taskunitspointsbasemodel'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/utility_taskunitspointsbasemodel/save/'.$utility_taskunitspointsbasemodel['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Total Units Task" class="col-md-4 control-label">Total
				Units Task</label>
			<div class="col-md-8">
				<input type="text" name="total_units_task"
					value="<?php echo ($this->input->post('total_units_task') ? $this->input->post('total_units_task') : $utility_taskunitspointsbasemodel['total_units_task']); ?>"
					class="form-control" id="total_units_task" />
			</div>
		</div>
		<div class="form-group">
			<label for="Unit Task Description" class="col-md-4 control-label">Unit
				Task Description</label>
			<div class="col-md-8">
				<input type="text" name="unit_task_description"
					value="<?php echo ($this->input->post('unit_task_description') ? $this->input->post('unit_task_description') : $utility_taskunitspointsbasemodel['unit_task_description']); ?>"
					class="form-control" id="unit_task_description" />
			</div>
		</div>
		<div class="form-group">
			<label for="Points On Unit Task" class="col-md-4 control-label">Points
				On Unit Task</label>
			<div class="col-md-8">
				<input type="text" name="points_on_unit_task"
					value="<?php echo ($this->input->post('points_on_unit_task') ? $this->input->post('points_on_unit_task') : $utility_taskunitspointsbasemodel['points_on_unit_task']); ?>"
					class="form-control" id="points_on_unit_task" />
			</div>
		</div>

	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success"><?php if(empty($utility_taskunitspointsbasemodel['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
