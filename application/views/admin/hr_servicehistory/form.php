<a href="<?php echo site_url('admin/hr_servicehistory/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Hr_servicehistory'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/hr_servicehistory/save/'.$hr_servicehistory['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
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
					<?php if($hr_servicehistory['hr_employee_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['first_name']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Designation" class="col-md-4 control-label">Designation</label>
			<div class="col-md-8">
				<input type="text" name="designation"
					value="<?php echo ($this->input->post('designation') ? $this->input->post('designation') : $hr_servicehistory['designation']); ?>"
					class="form-control" id="designation" />
			</div>
		</div>
		<div class="form-group">
			<label for="Office Name" class="col-md-4 control-label">Office Name</label>
			<div class="col-md-8">
				<input type="text" name="office_name"
					value="<?php echo ($this->input->post('office_name') ? $this->input->post('office_name') : $hr_servicehistory['office_name']); ?>"
					class="form-control" id="office_name" />
			</div>
		</div>
		<div class="form-group">
			<label for="Section" class="col-md-4 control-label">Section</label>
			<div class="col-md-8">
				<input type="text" name="section"
					value="<?php echo ($this->input->post('section') ? $this->input->post('section') : $hr_servicehistory['section']); ?>"
					class="form-control" id="section" />
			</div>
		</div>
		<div class="form-group">
			<label for="Date From" class="col-md-4 control-label">Date From</label>
			<div class="col-md-8">
				<input type="text" name="date_from" id="date_from"
					value="<?php echo ($this->input->post('date_from') ? $this->input->post('date_from') : $hr_servicehistory['date_from']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>

	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success"><?php if(empty($hr_servicehistory['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
