<a href="<?php echo site_url('admin/marketing_leads/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Marketing_leads'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/marketing_leads/save/'.$marketing_leads['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="First Name" class="col-md-4 control-label">First Name</label>
			<div class="col-md-8">
				<input type="text" name="first_name"
					value="<?php echo ($this->input->post('first_name') ? $this->input->post('first_name') : $marketing_leads['first_name']); ?>"
					class="form-control" id="first_name" />
			</div>
		</div>
		<div class="form-group">
			<label for="Last Name" class="col-md-4 control-label">Last Name</label>
			<div class="col-md-8">
				<input type="text" name="last_name"
					value="<?php echo ($this->input->post('last_name') ? $this->input->post('last_name') : $marketing_leads['last_name']); ?>"
					class="form-control" id="last_name" />
			</div>
		</div>
		<div class="form-group">
			<label for="Email" class="col-md-4 control-label">Email</label>
			<div class="col-md-8">
				<input type="text" name="email"
					value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $marketing_leads['email']); ?>"
					class="form-control" id="email" />
			</div>
		</div>
		<div class="form-group">
			<label for="Cell Phone" class="col-md-4 control-label">Cell Phone</label>
			<div class="col-md-8">
				<input type="text" name="cell_phone"
					value="<?php echo ($this->input->post('cell_phone') ? $this->input->post('cell_phone') : $marketing_leads['cell_phone']); ?>"
					class="form-control" id="cell_phone" />
			</div>
		</div>
		<div class="form-group">
			<label for="Land Phone" class="col-md-4 control-label">Land Phone</label>
			<div class="col-md-8">
				<input type="text" name="land_phone"
					value="<?php echo ($this->input->post('land_phone') ? $this->input->post('land_phone') : $marketing_leads['land_phone']); ?>"
					class="form-control" id="land_phone" />
			</div>
		</div>
		<div class="form-group">
			<label for="Address" class="col-md-4 control-label">Address</label>
			<div class="col-md-8">
				<textarea name="address" id="address" class="form-control" rows="4" /><?php echo ($this->input->post('address') ? $this->input->post('address') : $marketing_leads['address']); ?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label for="Status" class="col-md-4 control-label">Status</label>
			<div class="col-md-8"> 
           <?php
        $enumArr = $this->customlib->getEnumFieldValues('marketing_leads', 'status');
        ?> 
           <select name="status" id="status" class="form-control" />
				<option value="">--Select--</option> 
             <?php
            for ($i = 0; $i < count($enumArr); $i ++) {
                ?> 
             <option value="<?=$enumArr[$i]?>"
					<?php if($marketing_leads['status']==$enumArr[$i]){ echo "selected";} ?>><?=ucwords($enumArr[$i])?></option> 
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
		<button type="submit" class="btn btn-success"><?php if(empty($marketing_leads['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
