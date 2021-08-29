<a href="<?php echo site_url('admin/hr_children/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Hr_children'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/hr_children/save/'.$hr_children['id'],array("class"=>"form-horizontal")); ?>
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
					<?php if($hr_children['hr_employee_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['first_name']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Name" class="col-md-4 control-label">Name</label>
			<div class="col-md-8">
				<input type="text" name="name"
					value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $hr_children['name']); ?>"
					class="form-control" id="name" />
			</div>
		</div>
		<div class="form-group">
			<label for="Sex" class="col-md-4 control-label">Sex</label>
			<div class="col-md-8">
				<input type="text" name="sex"
					value="<?php echo ($this->input->post('sex') ? $this->input->post('sex') : $hr_children['sex']); ?>"
					class="form-control" id="sex" />
			</div>
		</div>
		<div class="form-group">
			<label for="Dob" class="col-md-4 control-label">Dob</label>
			<div class="col-md-8">
				<input type="text" name="dob" id="dob"
					value="<?php echo ($this->input->post('dob') ? $this->input->post('dob') : $hr_children['dob']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>

	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success"><?php if(empty($hr_children['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
