<a href="<?php echo site_url('admin/hr_languages/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Hr_languages'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/hr_languages/save/'.$hr_languages['id'],array("class"=>"form-horizontal")); ?>
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
					<?php if($hr_languages['hr_employee_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['first_name']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Languages" class="col-md-4 control-label">Languages</label>
			<div class="col-md-8">
				<input type="text" name="languages"
					value="<?php echo ($this->input->post('languages') ? $this->input->post('languages') : $hr_languages['languages']); ?>"
					class="form-control" id="languages" />
			</div>
		</div>
		<div class="form-group">
			<label for="Read" class="col-md-4 control-label">Read</label>
			<div class="col-md-8">
				<input type="text" name="read"
					value="<?php echo ($this->input->post('read') ? $this->input->post('read') : $hr_languages['read']); ?>"
					class="form-control" id="read" />
			</div>
		</div>
		<div class="form-group">
			<label for="Write" class="col-md-4 control-label">Write</label>
			<div class="col-md-8">
				<input type="text" name="write"
					value="<?php echo ($this->input->post('write') ? $this->input->post('write') : $hr_languages['write']); ?>"
					class="form-control" id="write" />
			</div>
		</div>
		<div class="form-group">
			<label for="Speak" class="col-md-4 control-label">Speak</label>
			<div class="col-md-8">
				<input type="text" name="speak"
					value="<?php echo ($this->input->post('speak') ? $this->input->post('speak') : $hr_languages['speak']); ?>"
					class="form-control" id="speak" />
			</div>
		</div>

	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success"><?php if(empty($hr_languages['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
