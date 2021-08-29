<a
	href="<?php echo site_url('admin/attendance_leaveapplication/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Attendance_leaveapplication'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/attendance_leaveapplication/save/'.$attendance_leaveapplication['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Subject" class="col-md-4 control-label">Subject</label>
			<div class="col-md-8">
				<input type="text" name="subject"
					value="<?php echo ($this->input->post('subject') ? $this->input->post('subject') : $attendance_leaveapplication['subject']); ?>"
					class="form-control" id="subject" />
			</div>
		</div>
		<div class="form-group">
			<label for="Description" class="col-md-4 control-label">Description</label>
			<div class="col-md-8">
				<input type="text" name="description"
					value="<?php echo ($this->input->post('description') ? $this->input->post('description') : $attendance_leaveapplication['description']); ?>"
					class="form-control" id="description" />
			</div>
		</div>
		<div class="form-group">
			<label for="Date From" class="col-md-4 control-label">Date From</label>
			<div class="col-md-8">
				<input type="text" name="date_from" id="date_from"
					value="<?php echo ($this->input->post('date_from') ? $this->input->post('date_from') : $attendance_leaveapplication['date_from']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="Time From" class="col-md-4 control-label">Time From</label>
			<div class="col-md-8">
				<input type="text" name="time_from"
					value="<?php echo ($this->input->post('time_from') ? $this->input->post('time_from') : $attendance_leaveapplication['time_from']); ?>"
					class="form-control" id="time_from" />
			</div>
		</div>
		<div class="form-group">
			<label for="End Date" class="col-md-4 control-label">End Date</label>
			<div class="col-md-8">
				<input type="text" name="end_date" id="end_date"
					value="<?php echo ($this->input->post('end_date') ? $this->input->post('end_date') : $attendance_leaveapplication['end_date']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="End Time" class="col-md-4 control-label">End Time</label>
			<div class="col-md-8">
				<input type="text" name="end_time"
					value="<?php echo ($this->input->post('end_time') ? $this->input->post('end_time') : $attendance_leaveapplication['end_time']); ?>"
					class="form-control" id="end_time" />
			</div>
		</div>
		<div class="form-group">
			<label for="Total In Hrs" class="col-md-4 control-label">Total In Hrs</label>
			<div class="col-md-8">
				<input type="text" name="total_in_hrs"
					value="<?php echo ($this->input->post('total_in_hrs') ? $this->input->post('total_in_hrs') : $attendance_leaveapplication['total_in_hrs']); ?>"
					class="form-control" id="total_in_hrs" />
			</div>
		</div>
		<div class="form-group">
			<label for="Comments" class="col-md-4 control-label">Comments</label>
			<div class="col-md-8">
				<input type="text" name="comments"
					value="<?php echo ($this->input->post('comments') ? $this->input->post('comments') : $attendance_leaveapplication['comments']); ?>"
					class="form-control" id="comments" />
			</div>
		</div>
		<div class="form-group">
			<label for="Status" class="col-md-4 control-label">Status</label>
			<div class="col-md-8">
				<input type="text" name="status"
					value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $attendance_leaveapplication['status']); ?>"
					class="form-control" id="status" />
			</div>
		</div>
		<div class="form-group">
			<label for="Hr Employee" class="col-md-4 control-label">Hr Employee</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Hr_employee_model');
        $dataArr = $this->CI->Hr_employee_model->get_all_hr_employee();
        ?> 
          <select name="hr_employee_id" id="hr_employee_id"
					class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($attendance_leaveapplication['hr_employee_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['first_name']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Manager Hr Employee" class="col-md-4 control-label">Manager
				Hr Employee</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Hr_employee_model');
        $dataArr = $this->CI->Hr_employee_model->get_all_hr_employee();
        ?> 
          <select name="manager_hr_employee_id"
					id="manager_hr_employee_id" class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($attendance_leaveapplication['manager_hr_employee_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['first_name']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>

	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success"><?php if(empty($attendance_leaveapplication['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
