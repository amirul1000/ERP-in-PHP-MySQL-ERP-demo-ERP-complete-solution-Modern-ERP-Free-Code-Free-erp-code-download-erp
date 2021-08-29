<a href="<?php echo site_url('admin/marketing_smtp/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Marketing_smtp'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/marketing_smtp/save/'.$marketing_smtp['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Smtp Name" class="col-md-4 control-label">Smtp Name</label>
			<div class="col-md-8">
				<input type="text" name="smtp_name"
					value="<?php echo ($this->input->post('smtp_name') ? $this->input->post('smtp_name') : $marketing_smtp['smtp_name']); ?>"
					class="form-control" id="smtp_name" />
			</div>
		</div>
		<div class="form-group">
			<label for="Host" class="col-md-4 control-label">Host</label>
			<div class="col-md-8">
				<input type="text" name="host"
					value="<?php echo ($this->input->post('host') ? $this->input->post('host') : $marketing_smtp['host']); ?>"
					class="form-control" id="host" />
			</div>
		</div>
		<div class="form-group">
			<label for="Email" class="col-md-4 control-label">Email</label>
			<div class="col-md-8">
				<input type="text" name="email"
					value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $marketing_smtp['email']); ?>"
					class="form-control" id="email" />
			</div>
		</div>
		<div class="form-group">
			<label for="Password" class="col-md-4 control-label">Password</label>
			<div class="col-md-8">
				<input type="text" name="password"
					value="<?php echo ($this->input->post('password') ? $this->input->post('password') : $marketing_smtp['password']); ?>"
					class="form-control" id="password" />
			</div>
		</div>
		<div class="form-group">
			<label for="Port" class="col-md-4 control-label">Port</label>
			<div class="col-md-8">
				<input type="text" name="port"
					value="<?php echo ($this->input->post('port') ? $this->input->post('port') : $marketing_smtp['port']); ?>"
					class="form-control" id="port" />
			</div>
		</div>
		<div class="form-group">
			<label for="Status" class="col-md-4 control-label">Status</label>
			<div class="col-md-8"> 
           <?php
        $enumArr = $this->customlib->getEnumFieldValues('marketing_smtp', 'status');
        ?> 
           <select name="status" id="status" class="form-control" />
				<option value="">--Select--</option> 
             <?php
            for ($i = 0; $i < count($enumArr); $i ++) {
                ?> 
             <option value="<?=$enumArr[$i]?>"
					<?php if($marketing_smtp['status']==$enumArr[$i]){ echo "selected";} ?>><?=ucwords($enumArr[$i])?></option> 
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
		<button type="submit" class="btn btn-success"><?php if(empty($marketing_smtp['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
