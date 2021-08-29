<a href="<?php echo site_url('admin/hr_address/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Hr_address'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/hr_address/save/'.$hr_address['id'],array("class"=>"form-horizontal")); ?>
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
					<?php if($hr_address['hr_employee_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['first_name']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Road Village" class="col-md-4 control-label">Road Village</label>
			<div class="col-md-8">
				<input type="text" name="road_village"
					value="<?php echo ($this->input->post('road_village') ? $this->input->post('road_village') : $hr_address['road_village']); ?>"
					class="form-control" id="road_village" />
			</div>
		</div>
		<div class="form-group">
			<label for="Postoffice" class="col-md-4 control-label">Postoffice</label>
			<div class="col-md-8">
				<input type="text" name="postoffice"
					value="<?php echo ($this->input->post('postoffice') ? $this->input->post('postoffice') : $hr_address['postoffice']); ?>"
					class="form-control" id="postoffice" />
			</div>
		</div>
		<div class="form-group">
			<label for="Post Code" class="col-md-4 control-label">Post Code</label>
			<div class="col-md-8">
				<input type="text" name="post_code"
					value="<?php echo ($this->input->post('post_code') ? $this->input->post('post_code') : $hr_address['post_code']); ?>"
					class="form-control" id="post_code" />
			</div>
		</div>
		<div class="form-group">
			<label for="Flat No" class="col-md-4 control-label">Flat No</label>
			<div class="col-md-8">
				<input type="text" name="flat_no"
					value="<?php echo ($this->input->post('flat_no') ? $this->input->post('flat_no') : $hr_address['flat_no']); ?>"
					class="form-control" id="flat_no" />
			</div>
		</div>
		<div class="form-group">
			<label for="Police Station Thana" class="col-md-4 control-label">Police
				Station Thana</label>
			<div class="col-md-8">
				<input type="text" name="police_station_thana"
					value="<?php echo ($this->input->post('police_station_thana') ? $this->input->post('police_station_thana') : $hr_address['police_station_thana']); ?>"
					class="form-control" id="police_station_thana" />
			</div>
		</div>
		<div class="form-group">
			<label for="District" class="col-md-4 control-label">District</label>
			<div class="col-md-8">
				<input type="text" name="district"
					value="<?php echo ($this->input->post('district') ? $this->input->post('district') : $hr_address['district']); ?>"
					class="form-control" id="district" />
			</div>
		</div>
		<div class="form-group">
			<label for="Date From" class="col-md-4 control-label">Date From</label>
			<div class="col-md-8">
				<input type="text" name="date_from" id="date_from"
					value="<?php echo ($this->input->post('date_from') ? $this->input->post('date_from') : $hr_address['date_from']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="Address Type" class="col-md-4 control-label">Address Type</label>
			<div class="col-md-8">
				<input type="text" name="address_type"
					value="<?php echo ($this->input->post('address_type') ? $this->input->post('address_type') : $hr_address['address_type']); ?>"
					class="form-control" id="address_type" />
			</div>
		</div>

	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success"><?php if(empty($hr_address['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
