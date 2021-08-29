<a href="<?php echo site_url('admin/inventory_warehouse/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Inventory_warehouse'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/inventory_warehouse/save/'.$inventory_warehouse['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Created On" class="col-md-4 control-label">Created On</label>
			<div class="col-md-8">
				<input type="text" name="created_on" id="created_on"
					value="<?php echo ($this->input->post('created_on') ? $this->input->post('created_on') : $inventory_warehouse['created_on']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="Modified On" class="col-md-4 control-label">Modified On</label>
			<div class="col-md-8">
				<input type="text" name="modified_on" id="modified_on"
					value="<?php echo ($this->input->post('modified_on') ? $this->input->post('modified_on') : $inventory_warehouse['modified_on']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="Code" class="col-md-4 control-label">Code</label>
			<div class="col-md-8">
				<input type="text" name="code"
					value="<?php echo ($this->input->post('code') ? $this->input->post('code') : $inventory_warehouse['code']); ?>"
					class="form-control" id="code" />
			</div>
		</div>
		<div class="form-group">
			<label for="Name" class="col-md-4 control-label">Name</label>
			<div class="col-md-8">
				<input type="text" name="name"
					value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $inventory_warehouse['name']); ?>"
					class="form-control" id="name" />
			</div>
		</div>
		<div class="form-group">
			<label for="Location" class="col-md-4 control-label">Location</label>
			<div class="col-md-8">
				<input type="text" name="location"
					value="<?php echo ($this->input->post('location') ? $this->input->post('location') : $inventory_warehouse['location']); ?>"
					class="form-control" id="location" />
			</div>
		</div>
		<div class="form-group">
			<label for="Date Start" class="col-md-4 control-label">Date Start</label>
			<div class="col-md-8">
				<input type="text" name="date_start" id="date_start"
					value="<?php echo ($this->input->post('date_start') ? $this->input->post('date_start') : $inventory_warehouse['date_start']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="Date End" class="col-md-4 control-label">Date End</label>
			<div class="col-md-8">
				<input type="text" name="date_end" id="date_end"
					value="<?php echo ($this->input->post('date_end') ? $this->input->post('date_end') : $inventory_warehouse['date_end']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="Status" class="col-md-4 control-label">Status</label>
			<div class="col-md-8">
				<input type="text" name="status"
					value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $inventory_warehouse['status']); ?>"
					class="form-control" id="status" />
			</div>
		</div>
		<div class="form-group">
			<label for="Created By Users" class="col-md-4 control-label">Created
				By Users</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Users_model');
        $dataArr = $this->CI->Users_model->get_all_users();
        ?> 
          <select name="created_by_users_id" id="created_by_users_id"
					class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($inventory_warehouse['created_by_users_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['email']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="Modified By Users" class="col-md-4 control-label">Modified
				By Users</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Users_model');
        $dataArr = $this->CI->Users_model->get_all_users();
        ?> 
          <select name="modified_by_users_id" id="modified_by_users_id"
					class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($inventory_warehouse['modified_by_users_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['email']?></option> 
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
		<button type="submit" class="btn btn-success"><?php if(empty($inventory_warehouse['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
