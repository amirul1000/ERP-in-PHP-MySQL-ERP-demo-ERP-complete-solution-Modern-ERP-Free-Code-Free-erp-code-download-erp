<a href="<?php echo site_url('admin/hr_training/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Hr_training'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/hr_training/save/'.$hr_training['id'],array("class"=>"form-horizontal")); ?>
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
					<?php if($hr_training['hr_employee_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['first_name']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Title Trainin" class="col-md-4 control-label">Title
				Trainin</label>
			<div class="col-md-8">
				<input type="text" name="title_trainin"
					value="<?php echo ($this->input->post('title_trainin') ? $this->input->post('title_trainin') : $hr_training['title_trainin']); ?>"
					class="form-control" id="title_trainin" />
			</div>
		</div>
		<div class="form-group">
			<label for="Institution" class="col-md-4 control-label">Institution</label>
			<div class="col-md-8">
				<input type="text" name="institution"
					value="<?php echo ($this->input->post('institution') ? $this->input->post('institution') : $hr_training['institution']); ?>"
					class="form-control" id="institution" />
			</div>
		</div>
		<div class="form-group">
			<label for="Date From" class="col-md-4 control-label">Date From</label>
			<div class="col-md-8">
				<input type="text" name="date_from" id="date_from"
					value="<?php echo ($this->input->post('date_from') ? $this->input->post('date_from') : $hr_training['date_from']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="Trining Type" class="col-md-4 control-label">Trining Type</label>
			<div class="col-md-8">
				<input type="text" name="trining_type"
					value="<?php echo ($this->input->post('trining_type') ? $this->input->post('trining_type') : $hr_training['trining_type']); ?>"
					class="form-control" id="trining_type" />
			</div>
		</div>
		<div class="form-group">
			<label for="Date To" class="col-md-4 control-label">Date To</label>
			<div class="col-md-8">
				<input type="text" name="date_to" id="date_to"
					value="<?php echo ($this->input->post('date_to') ? $this->input->post('date_to') : $hr_training['date_to']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>

	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success"><?php if(empty($hr_training['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
