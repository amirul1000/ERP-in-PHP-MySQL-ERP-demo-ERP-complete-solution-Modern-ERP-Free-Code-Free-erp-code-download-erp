<a href="<?php echo site_url('admin/attendance_leave/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Attendance_leave'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/attendance_leave/save/'.$attendance_leave['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Leave Type" class="col-md-4 control-label">Leave Type</label>
			<div class="col-md-8">
				<input type="text" name="leave_type"
					value="<?php echo ($this->input->post('leave_type') ? $this->input->post('leave_type') : $attendance_leave['leave_type']); ?>"
					class="form-control" id="leave_type" />
			</div>
		</div>
		<div class="form-group">
			<label for="Date From" class="col-md-4 control-label">Date From</label>
			<div class="col-md-8">
				<input type="text" name="date_from" id="date_from"
					value="<?php echo ($this->input->post('date_from') ? $this->input->post('date_from') : $attendance_leave['date_from']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="Time From" class="col-md-4 control-label">Time From</label>
			<div class="col-md-8">
				<input type="text" name="time_from"
					value="<?php echo ($this->input->post('time_from') ? $this->input->post('time_from') : $attendance_leave['time_from']); ?>"
					class="form-control" id="time_from" />
			</div>
		</div>
		<div class="form-group">
			<label for="End Date" class="col-md-4 control-label">End Date</label>
			<div class="col-md-8">
				<input type="text" name="end_date" id="end_date"
					value="<?php echo ($this->input->post('end_date') ? $this->input->post('end_date') : $attendance_leave['end_date']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="End Time" class="col-md-4 control-label">End Time</label>
			<div class="col-md-8">
				<input type="text" name="end_time"
					value="<?php echo ($this->input->post('end_time') ? $this->input->post('end_time') : $attendance_leave['end_time']); ?>"
					class="form-control" id="end_time" />
			</div>
		</div>
		<div class="form-group">
			<label for="Total In Hrs" class="col-md-4 control-label">Total In Hrs</label>
			<div class="col-md-8">
				<input type="text" name="total_in_hrs"
					value="<?php echo ($this->input->post('total_in_hrs') ? $this->input->post('total_in_hrs') : $attendance_leave['total_in_hrs']); ?>"
					class="form-control" id="total_in_hrs" />
			</div>
		</div>
		<div class="form-group">
			<label for="Comments" class="col-md-4 control-label">Comments</label>
			<div class="col-md-8">
				<input type="text" name="comments"
					value="<?php echo ($this->input->post('comments') ? $this->input->post('comments') : $attendance_leave['comments']); ?>"
					class="form-control" id="comments" />
			</div>
		</div>
		<div class="form-group">
			<label for="Status" class="col-md-4 control-label">Status</label>
			<div class="col-md-8">
				<input type="text" name="status"
					value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $attendance_leave['status']); ?>"
					class="form-control" id="status" />
			</div>
		</div>
		<div class="form-group">
			<label for="Attendance Leaveapplication"
				class="col-md-4 control-label">Attendance Leaveapplication</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Attendance_leaveapplication_model');
        $dataArr = $this->CI->Attendance_leaveapplication_model->get_all_attendance_leaveapplication();
        ?> 
          <select name="attendance_leaveapplication_id"
					id="attendance_leaveapplication_id" class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($attendance_leave['attendance_leaveapplication_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['subject']?></option> 
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
		<button type="submit" class="btn btn-success"><?php if(empty($attendance_leave['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
