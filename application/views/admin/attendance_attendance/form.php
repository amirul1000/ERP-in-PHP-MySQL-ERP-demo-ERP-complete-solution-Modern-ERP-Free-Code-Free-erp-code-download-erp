<a href="<?php echo site_url('admin/attendance_attendance/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Attendance_attendance'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/attendance_attendance/save/'.$attendance_attendance['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Enterance Date" class="col-md-4 control-label">Enterance
				Date</label>
			<div class="col-md-8">
				<input type="text" name="enterance_date" id="enterance_date"
					value="<?php echo ($this->input->post('enterance_date') ? $this->input->post('enterance_date') : $attendance_attendance['enterance_date']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="Enterance Time" class="col-md-4 control-label">Enterance
				Time</label>
			<div class="col-md-8">
				<input type="text" name="enterance_time"
					value="<?php echo ($this->input->post('enterance_time') ? $this->input->post('enterance_time') : $attendance_attendance['enterance_time']); ?>"
					class="form-control" id="enterance_time" />
			</div>
		</div>
		<div class="form-group">
			<label for="Deperature Date" class="col-md-4 control-label">Deperature
				Date</label>
			<div class="col-md-8">
				<input type="text" name="deperature_date" id="deperature_date"
					value="<?php echo ($this->input->post('deperature_date') ? $this->input->post('deperature_date') : $attendance_attendance['deperature_date']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="Deperature Time" class="col-md-4 control-label">Deperature
				Time</label>
			<div class="col-md-8">
				<input type="text" name="deperature_time"
					value="<?php echo ($this->input->post('deperature_time') ? $this->input->post('deperature_time') : $attendance_attendance['deperature_time']); ?>"
					class="form-control" id="deperature_time" />
			</div>
		</div>
		<div class="form-group">
			<label for="Entry Card Status" class="col-md-4 control-label">Entry
				Card Status</label>
			<div class="col-md-8">
				<input type="text" name="entry_card_status"
					value="<?php echo ($this->input->post('entry_card_status') ? $this->input->post('entry_card_status') : $attendance_attendance['entry_card_status']); ?>"
					class="form-control" id="entry_card_status" />
			</div>
		</div>
		<div class="form-group">
			<label for="Comments" class="col-md-4 control-label">Comments</label>
			<div class="col-md-8">
				<input type="text" name="comments"
					value="<?php echo ($this->input->post('comments') ? $this->input->post('comments') : $attendance_attendance['comments']); ?>"
					class="form-control" id="comments" />
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
					<?php if($attendance_attendance['hr_employee_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['first_name']?></option> 
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
		<button type="submit" class="btn btn-success"><?php if(empty($attendance_attendance['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
