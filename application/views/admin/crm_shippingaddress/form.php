<a href="<?php echo site_url('admin/crm_shippingaddress/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Crm_shippingaddress'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/crm_shippingaddress/save/'.$crm_shippingaddress['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Address1" class="col-md-4 control-label">Address1</label>
			<div class="col-md-8">
				<input type="text" name="address1"
					value="<?php echo ($this->input->post('address1') ? $this->input->post('address1') : $crm_shippingaddress['address1']); ?>"
					class="form-control" id="address1" />
			</div>
		</div>
		<div class="form-group">
			<label for="Address2" class="col-md-4 control-label">Address2</label>
			<div class="col-md-8">
				<input type="text" name="address2"
					value="<?php echo ($this->input->post('address2') ? $this->input->post('address2') : $crm_shippingaddress['address2']); ?>"
					class="form-control" id="address2" />
			</div>
		</div>
		<div class="form-group">
			<label for="Country" class="col-md-4 control-label">Country</label>
			<div class="col-md-8">
				<input type="text" name="country"
					value="<?php echo ($this->input->post('country') ? $this->input->post('country') : $crm_shippingaddress['country']); ?>"
					class="form-control" id="country" />
			</div>
		</div>
		<div class="form-group">
			<label for="State" class="col-md-4 control-label">State</label>
			<div class="col-md-8">
				<input type="text" name="state"
					value="<?php echo ($this->input->post('state') ? $this->input->post('state') : $crm_shippingaddress['state']); ?>"
					class="form-control" id="state" />
			</div>
		</div>
		<div class="form-group">
			<label for="City" class="col-md-4 control-label">City</label>
			<div class="col-md-8">
				<input type="text" name="city"
					value="<?php echo ($this->input->post('city') ? $this->input->post('city') : $crm_shippingaddress['city']); ?>"
					class="form-control" id="city" />
			</div>
		</div>
		<div class="form-group">
			<label for="Zip Code" class="col-md-4 control-label">Zip Code</label>
			<div class="col-md-8">
				<input type="text" name="zip_code"
					value="<?php echo ($this->input->post('zip_code') ? $this->input->post('zip_code') : $crm_shippingaddress['zip_code']); ?>"
					class="form-control" id="zip_code" />
			</div>
		</div>

	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success"><?php if(empty($crm_shippingaddress['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
