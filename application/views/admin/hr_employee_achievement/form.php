<a href="<?php echo site_url('admin/hr_employee_achievement/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Hr_employee_achievement'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/hr_employee_achievement/save/'.$hr_employee_achievement['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Points To Hr Employee" class="col-md-4 control-label">Points
				To Hr Employee</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Hr_employee_model');
        $dataArr = $this->CI->Hr_employee_model->get_all_hr_employee();
        ?> 
          <select name="points_to_hr_employee_id"
					id="points_to_hr_employee_id" class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($hr_employee_achievement['points_to_hr_employee_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['first_name']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Points By Hr Employee" class="col-md-4 control-label">Points
				By Hr Employee</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Hr_employee_model');
        $dataArr = $this->CI->Hr_employee_model->get_all_hr_employee();
        ?> 
          <select name="points_by_hr_employee_id"
					id="points_by_hr_employee_id" class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($hr_employee_achievement['points_by_hr_employee_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['first_name']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Description" class="col-md-4 control-label">Description</label>
			<div class="col-md-8">
				<input type="text" name="description"
					value="<?php echo ($this->input->post('description') ? $this->input->post('description') : $hr_employee_achievement['description']); ?>"
					class="form-control" id="description" />
			</div>
		</div>
		<div class="form-group">
			<label for="No Of Units Completed" class="col-md-4 control-label">No
				Of Units Completed</label>
			<div class="col-md-8">
				<input type="text" name="no_of_units_completed"
					value="<?php echo ($this->input->post('no_of_units_completed') ? $this->input->post('no_of_units_completed') : $hr_employee_achievement['no_of_units_completed']); ?>"
					class="form-control" id="no_of_units_completed" />
			</div>
		</div>
		<div class="form-group">
			<label for="Points On Unit Task" class="col-md-4 control-label">Points
				On Unit Task</label>
			<div class="col-md-8">
				<input type="text" name="points_on_unit_task"
					value="<?php echo ($this->input->post('points_on_unit_task') ? $this->input->post('points_on_unit_task') : $hr_employee_achievement['points_on_unit_task']); ?>"
					class="form-control" id="points_on_unit_task" />
			</div>
		</div>
		<div class="form-group">
			<label for="Date Achivement" class="col-md-4 control-label">Date
				Achivement</label>
			<div class="col-md-8">
				<input type="text" name="date_achivement" id="date_achivement"
					value="<?php echo ($this->input->post('date_achivement') ? $this->input->post('date_achivement') : $hr_employee_achievement['date_achivement']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="Total Units Points" class="col-md-4 control-label">Total
				Units Points</label>
			<div class="col-md-8">
				<input type="text" name="total_units_points"
					value="<?php echo ($this->input->post('total_units_points') ? $this->input->post('total_units_points') : $hr_employee_achievement['total_units_points']); ?>"
					class="form-control" id="total_units_points" />
			</div>
		</div>

	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success"><?php if(empty($hr_employee_achievement['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
