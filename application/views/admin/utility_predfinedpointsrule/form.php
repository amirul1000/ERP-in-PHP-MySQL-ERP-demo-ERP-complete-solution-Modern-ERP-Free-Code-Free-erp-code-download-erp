<a
	href="<?php echo site_url('admin/utility_predfinedpointsrule/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Utility_predfinedpointsrule'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/utility_predfinedpointsrule/save/'.$utility_predfinedpointsrule['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Created On" class="col-md-4 control-label">Created On</label>
			<div class="col-md-8">
				<input type="text" name="created_on" id="created_on"
					value="<?php echo ($this->input->post('created_on') ? $this->input->post('created_on') : $utility_predfinedpointsrule['created_on']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="Modified On" class="col-md-4 control-label">Modified On</label>
			<div class="col-md-8">
				<input type="text" name="modified_on" id="modified_on"
					value="<?php echo ($this->input->post('modified_on') ? $this->input->post('modified_on') : $utility_predfinedpointsrule['modified_on']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="Units Points" class="col-md-4 control-label">Units Points</label>
			<div class="col-md-8">
				<input type="text" name="units_points"
					value="<?php echo ($this->input->post('units_points') ? $this->input->post('units_points') : $utility_predfinedpointsrule['units_points']); ?>"
					class="form-control" id="units_points" />
			</div>
		</div>
		<div class="form-group">
			<label for="Task Description" class="col-md-4 control-label">Task
				Description</label>
			<div class="col-md-8">
				<input type="text" name="task_description"
					value="<?php echo ($this->input->post('task_description') ? $this->input->post('task_description') : $utility_predfinedpointsrule['task_description']); ?>"
					class="form-control" id="task_description" />
			</div>
		</div>
		<div class="form-group">
			<label for="Comments" class="col-md-4 control-label">Comments</label>
			<div class="col-md-8">
				<input type="text" name="comments"
					value="<?php echo ($this->input->post('comments') ? $this->input->post('comments') : $utility_predfinedpointsrule['comments']); ?>"
					class="form-control" id="comments" />
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
					<?php if($utility_predfinedpointsrule['created_by_users_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['email']?></option> 
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
					<?php if($utility_predfinedpointsrule['modified_by_users_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['email']?></option> 
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
		<button type="submit" class="btn btn-success"><?php if(empty($utility_predfinedpointsrule['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
