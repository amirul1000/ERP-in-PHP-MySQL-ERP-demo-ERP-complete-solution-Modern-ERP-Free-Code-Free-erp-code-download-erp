<a href="<?php echo site_url('admin/attendance_in_out_track/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Attendance_in_out_track'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/attendance_in_out_track/save/'.$attendance_in_out_track['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Time Occure" class="col-md-4 control-label">Time Occure</label>
			<div class="col-md-8">
				<input type="text" name="time_occure"
					value="<?php echo ($this->input->post('time_occure') ? $this->input->post('time_occure') : $attendance_in_out_track['time_occure']); ?>"
					class="form-control" id="time_occure" />
			</div>
		</div>
		<div class="form-group">
			<label for="In Out" class="col-md-4 control-label">In Out</label>
			<div class="col-md-8">
				<input type="text" name="in_out"
					value="<?php echo ($this->input->post('in_out') ? $this->input->post('in_out') : $attendance_in_out_track['in_out']); ?>"
					class="form-control" id="in_out" />
			</div>
		</div>
		<div class="form-group">
			<label for="Entry Card Status" class="col-md-4 control-label">Entry
				Card Status</label>
			<div class="col-md-8">
				<input type="text" name="entry_card_status"
					value="<?php echo ($this->input->post('entry_card_status') ? $this->input->post('entry_card_status') : $attendance_in_out_track['entry_card_status']); ?>"
					class="form-control" id="entry_card_status" />
			</div>
		</div>
		<div class="form-group">
			<label for="Comments" class="col-md-4 control-label">Comments</label>
			<div class="col-md-8">
				<input type="text" name="comments"
					value="<?php echo ($this->input->post('comments') ? $this->input->post('comments') : $attendance_in_out_track['comments']); ?>"
					class="form-control" id="comments" />
			</div>
		</div>
		<div class="form-group">
			<label for="Attendance Attendance" class="col-md-4 control-label">Attendance
				Attendance</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Attendance_attendance_model');
        $dataArr = $this->CI->Attendance_attendance_model->get_all_attendance_attendance();
        ?> 
          <select name="attendance_attendance_id"
					id="attendance_attendance_id" class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($attendance_in_out_track['attendance_attendance_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['enterance_date']?></option> 
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
		<button type="submit" class="btn btn-success"><?php if(empty($attendance_in_out_track['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
