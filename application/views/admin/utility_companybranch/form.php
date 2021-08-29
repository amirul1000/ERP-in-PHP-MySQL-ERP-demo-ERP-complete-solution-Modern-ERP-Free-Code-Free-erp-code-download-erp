<a href="<?php echo site_url('admin/utility_companybranch/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Utility_companybranch'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/utility_companybranch/save/'.$utility_companybranch['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Name" class="col-md-4 control-label">Name</label>
			<div class="col-md-8">
				<input type="text" name="name"
					value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $utility_companybranch['name']); ?>"
					class="form-control" id="name" />
			</div>
		</div>
		<div class="form-group">
			<label for="Description" class="col-md-4 control-label">Description</label>
			<div class="col-md-8">
				<input type="text" name="description"
					value="<?php echo ($this->input->post('description') ? $this->input->post('description') : $utility_companybranch['description']); ?>"
					class="form-control" id="description" />
			</div>
		</div>
		<div class="form-group">
			<label for="Email" class="col-md-4 control-label">Email</label>
			<div class="col-md-8">
				<input type="text" name="email"
					value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $utility_companybranch['email']); ?>"
					class="form-control" id="email" />
			</div>
		</div>
		<div class="form-group">
			<label for="Cell Phone" class="col-md-4 control-label">Cell Phone</label>
			<div class="col-md-8">
				<input type="text" name="cell_phone"
					value="<?php echo ($this->input->post('cell_phone') ? $this->input->post('cell_phone') : $utility_companybranch['cell_phone']); ?>"
					class="form-control" id="cell_phone" />
			</div>
		</div>
		<div class="form-group">
			<label for="Land Phone" class="col-md-4 control-label">Land Phone</label>
			<div class="col-md-8">
				<input type="text" name="land_phone"
					value="<?php echo ($this->input->post('land_phone') ? $this->input->post('land_phone') : $utility_companybranch['land_phone']); ?>"
					class="form-control" id="land_phone" />
			</div>
		</div>
		<div class="form-group">
			<label for="Country" class="col-md-4 control-label">Country</label>
			<div class="col-md-8">
				<input type="text" name="country"
					value="<?php echo ($this->input->post('country') ? $this->input->post('country') : $utility_companybranch['country']); ?>"
					class="form-control" id="country" />
			</div>
		</div>
		<div class="form-group">
			<label for="State" class="col-md-4 control-label">State</label>
			<div class="col-md-8">
				<input type="text" name="state"
					value="<?php echo ($this->input->post('state') ? $this->input->post('state') : $utility_companybranch['state']); ?>"
					class="form-control" id="state" />
			</div>
		</div>
		<div class="form-group">
			<label for="City" class="col-md-4 control-label">City</label>
			<div class="col-md-8">
				<input type="text" name="city"
					value="<?php echo ($this->input->post('city') ? $this->input->post('city') : $utility_companybranch['city']); ?>"
					class="form-control" id="city" />
			</div>
		</div>
		<div class="form-group">
			<label for="Zip Code" class="col-md-4 control-label">Zip Code</label>
			<div class="col-md-8">
				<input type="text" name="zip_code"
					value="<?php echo ($this->input->post('zip_code') ? $this->input->post('zip_code') : $utility_companybranch['zip_code']); ?>"
					class="form-control" id="zip_code" />
			</div>
		</div>
		<div class="form-group">
			<label for="About" class="col-md-4 control-label">About</label>
			<div class="col-md-8">
				<input type="text" name="about"
					value="<?php echo ($this->input->post('about') ? $this->input->post('about') : $utility_companybranch['about']); ?>"
					class="form-control" id="about" />
			</div>
		</div>
		<div class="form-group">
			<label for="Contact Details" class="col-md-4 control-label">Contact
				Details</label>
			<div class="col-md-8">
				<input type="text" name="contact_details"
					value="<?php echo ($this->input->post('contact_details') ? $this->input->post('contact_details') : $utility_companybranch['contact_details']); ?>"
					class="form-control" id="contact_details" />
			</div>
		</div>
		<div class="form-group">
			<label for="Latitude" class="col-md-4 control-label">Latitude</label>
			<div class="col-md-8">
				<input type="text" name="latitude"
					value="<?php echo ($this->input->post('latitude') ? $this->input->post('latitude') : $utility_companybranch['latitude']); ?>"
					class="form-control" id="latitude" />
			</div>
		</div>
		<div class="form-group">
			<label for="Longitude" class="col-md-4 control-label">Longitude</label>
			<div class="col-md-8">
				<input type="text" name="longitude"
					value="<?php echo ($this->input->post('longitude') ? $this->input->post('longitude') : $utility_companybranch['longitude']); ?>"
					class="form-control" id="longitude" />
			</div>
		</div>
		<div class="form-group">
			<label for="Year Established" class="col-md-4 control-label">Year
				Established</label>
			<div class="col-md-8">
				<input type="text" name="year_established" id="year_established"
					value="<?php echo ($this->input->post('year_established') ? $this->input->post('year_established') : $utility_companybranch['year_established']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="Total Employees" class="col-md-4 control-label">Total
				Employees</label>
			<div class="col-md-8">
				<input type="text" name="total_employees"
					value="<?php echo ($this->input->post('total_employees') ? $this->input->post('total_employees') : $utility_companybranch['total_employees']); ?>"
					class="form-control" id="total_employees" />
			</div>
		</div>
		<div class="form-group">
			<label for="Business Type" class="col-md-4 control-label">Business
				Type</label>
			<div class="col-md-8">
				<input type="text" name="business_type"
					value="<?php echo ($this->input->post('business_type') ? $this->input->post('business_type') : $utility_companybranch['business_type']); ?>"
					class="form-control" id="business_type" />
			</div>
		</div>
		<div class="form-group">
			<label for="Main Products" class="col-md-4 control-label">Main
				Products</label>
			<div class="col-md-8">
				<input type="text" name="main_products"
					value="<?php echo ($this->input->post('main_products') ? $this->input->post('main_products') : $utility_companybranch['main_products']); ?>"
					class="form-control" id="main_products" />
			</div>
		</div>
		<div class="form-group">
			<label for="Total Annual Revenue" class="col-md-4 control-label">Total
				Annual Revenue</label>
			<div class="col-md-8">
				<input type="text" name="total_annual_revenue"
					value="<?php echo ($this->input->post('total_annual_revenue') ? $this->input->post('total_annual_revenue') : $utility_companybranch['total_annual_revenue']); ?>"
					class="form-control" id="total_annual_revenue" />
			</div>
		</div>
		<div class="form-group">
			<label for="Url" class="col-md-4 control-label">Url</label>
			<div class="col-md-8">
				<input type="text" name="url"
					value="<?php echo ($this->input->post('url') ? $this->input->post('url') : $utility_companybranch['url']); ?>"
					class="form-control" id="url" />
			</div>
		</div>
		<div class="form-group">
			<label for="Social Link" class="col-md-4 control-label">Social Link</label>
			<div class="col-md-8">
				<input type="text" name="social_link"
					value="<?php echo ($this->input->post('social_link') ? $this->input->post('social_link') : $utility_companybranch['social_link']); ?>"
					class="form-control" id="social_link" />
			</div>
		</div>
		<div class="form-group">
			<label for="Utility Company" class="col-md-4 control-label">Utility
				Company</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Utility_company_model');
        $dataArr = $this->CI->Utility_company_model->get_all_utility_company();
        ?> 
          <select name="utility_company_id" id="utility_company_id"
					class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($utility_companybranch['utility_company_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['name']?></option> 
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
		<button type="submit" class="btn btn-success"><?php if(empty($utility_companybranch['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
