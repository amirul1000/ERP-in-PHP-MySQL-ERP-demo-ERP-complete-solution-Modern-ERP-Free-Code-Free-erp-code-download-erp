<a href="<?php echo site_url('admin/hr_employee/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Hr_employee'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/hr_employee/save/'.$hr_employee['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
	<div class="card-body">
		<div class="form-group">
			<label for="Users" class="col-md-4 control-label">Users</label>
			<div class="col-md-8"> 
          <?php
        $this->CI = & get_instance();
        $this->CI->load->database();
        $this->CI->load->model('Users_model');
        $dataArr = $this->CI->Users_model->get_all_users();
        ?> 
          <select name="users_id" id="users_id" class="form-control" />
				<option value="">--Select--</option> 
            <?php
            for ($i = 0; $i < count($dataArr); $i ++) {
                ?> 
            <option value="<?=$dataArr[$i]['id']?>"
					<?php if($hr_employee['users_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['email']?></option> 
            <?php
            }
            ?> 
          </select>
			</div>
		</div>
		<div class="form-group">
			<label for="First Name" class="col-md-4 control-label">First Name</label>
			<div class="col-md-8">
				<input type="text" name="first_name"
					value="<?php echo ($this->input->post('first_name') ? $this->input->post('first_name') : $hr_employee['first_name']); ?>"
					class="form-control" id="first_name" />
			</div>
		</div>
		<div class="form-group">
			<label for="Last Name" class="col-md-4 control-label">Last Name</label>
			<div class="col-md-8">
				<input type="text" name="last_name"
					value="<?php echo ($this->input->post('last_name') ? $this->input->post('last_name') : $hr_employee['last_name']); ?>"
					class="form-control" id="last_name" />
			</div>
		</div>
		<div class="form-group">
			<label for="Gender" class="col-md-4 control-label">Gender</label>
			<div class="col-md-8">
				<input type="text" name="gender"
					value="<?php echo ($this->input->post('gender') ? $this->input->post('gender') : $hr_employee['gender']); ?>"
					class="form-control" id="gender" />
			</div>
		</div>
		<div class="form-group">
			<label for="Date Of Birth" class="col-md-4 control-label">Date Of
				Birth</label>
			<div class="col-md-8">
				<input type="text" name="date_of_birth" id="date_of_birth"
					value="<?php echo ($this->input->post('date_of_birth') ? $this->input->post('date_of_birth') : $hr_employee['date_of_birth']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="Nationa" class="col-md-4 control-label">Nationa</label>
			<div class="col-md-8">
				<input type="text" name="nationalid"
					value="<?php echo ($this->input->post('nationalid') ? $this->input->post('nationalid') : $hr_employee['nationalid']); ?>"
					class="form-control" id="nationalid" />
			</div>
		</div>
		<div class="form-group">
			<label for="Blood Group" class="col-md-4 control-label">Blood Group</label>
			<div class="col-md-8">
				<input type="text" name="blood_group"
					value="<?php echo ($this->input->post('blood_group') ? $this->input->post('blood_group') : $hr_employee['blood_group']); ?>"
					class="form-control" id="blood_group" />
			</div>
		</div>
		<div class="form-group">
			<label for="Marital Status" class="col-md-4 control-label">Marital
				Status</label>
			<div class="col-md-8">
				<input type="text" name="marital_status"
					value="<?php echo ($this->input->post('marital_status') ? $this->input->post('marital_status') : $hr_employee['marital_status']); ?>"
					class="form-control" id="marital_status" />
			</div>
		</div>
		<div class="form-group">
			<label for="Name Spouse" class="col-md-4 control-label">Name Spouse</label>
			<div class="col-md-8">
				<input type="text" name="name_spouse"
					value="<?php echo ($this->input->post('name_spouse') ? $this->input->post('name_spouse') : $hr_employee['name_spouse']); ?>"
					class="form-control" id="name_spouse" />
			</div>
		</div>
		<div class="form-group">
			<label for="Email" class="col-md-4 control-label">Email</label>
			<div class="col-md-8">
				<input type="text" name="email"
					value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $hr_employee['email']); ?>"
					class="form-control" id="email" />
			</div>
		</div>
		<div class="form-group">
			<label for="Cell Phone" class="col-md-4 control-label">Cell Phone</label>
			<div class="col-md-8">
				<input type="text" name="cell_phone"
					value="<?php echo ($this->input->post('cell_phone') ? $this->input->post('cell_phone') : $hr_employee['cell_phone']); ?>"
					class="form-control" id="cell_phone" />
			</div>
		</div>
		<div class="form-group">
			<label for="Land Phone" class="col-md-4 control-label">Land Phone</label>
			<div class="col-md-8">
				<input type="text" name="land_phone"
					value="<?php echo ($this->input->post('land_phone') ? $this->input->post('land_phone') : $hr_employee['land_phone']); ?>"
					class="form-control" id="land_phone" />
			</div>
		</div>
		<div class="form-group">
			<label for="Country" class="col-md-4 control-label">Country</label>
			<div class="col-md-8">
				<input type="text" name="country"
					value="<?php echo ($this->input->post('country') ? $this->input->post('country') : $hr_employee['country']); ?>"
					class="form-control" id="country" />
			</div>
		</div>
		<div class="form-group">
			<label for="State" class="col-md-4 control-label">State</label>
			<div class="col-md-8">
				<input type="text" name="state"
					value="<?php echo ($this->input->post('state') ? $this->input->post('state') : $hr_employee['state']); ?>"
					class="form-control" id="state" />
			</div>
		</div>
		<div class="form-group">
			<label for="City" class="col-md-4 control-label">City</label>
			<div class="col-md-8">
				<input type="text" name="city"
					value="<?php echo ($this->input->post('city') ? $this->input->post('city') : $hr_employee['city']); ?>"
					class="form-control" id="city" />
			</div>
		</div>
		<div class="form-group">
			<label for="Zip Code" class="col-md-4 control-label">Zip Code</label>
			<div class="col-md-8">
				<input type="text" name="zip_code"
					value="<?php echo ($this->input->post('zip_code') ? $this->input->post('zip_code') : $hr_employee['zip_code']); ?>"
					class="form-control" id="zip_code" />
			</div>
		</div>
		<div class="form-group">
			<label for="Permanent Address" class="col-md-4 control-label">Permanent
				Address</label>
			<div class="col-md-8">
				<input type="text" name="permanent_address"
					value="<?php echo ($this->input->post('permanent_address') ? $this->input->post('permanent_address') : $hr_employee['permanent_address']); ?>"
					class="form-control" id="permanent_address" />
			</div>
		</div>
		<div class="form-group">
			<label for="About" class="col-md-4 control-label">About</label>
			<div class="col-md-8">
				<input type="text" name="about"
					value="<?php echo ($this->input->post('about') ? $this->input->post('about') : $hr_employee['about']); ?>"
					class="form-control" id="about" />
			</div>
		</div>
		<div class="form-group">
			<label for="Contact Details" class="col-md-4 control-label">Contact
				Details</label>
			<div class="col-md-8">
				<input type="text" name="contact_details"
					value="<?php echo ($this->input->post('contact_details') ? $this->input->post('contact_details') : $hr_employee['contact_details']); ?>"
					class="form-control" id="contact_details" />
			</div>
		</div>
		<div class="form-group">
			<label for="Latitude" class="col-md-4 control-label">Latitude</label>
			<div class="col-md-8">
				<input type="text" name="latitude"
					value="<?php echo ($this->input->post('latitude') ? $this->input->post('latitude') : $hr_employee['latitude']); ?>"
					class="form-control" id="latitude" />
			</div>
		</div>
		<div class="form-group">
			<label for="Longitude" class="col-md-4 control-label">Longitude</label>
			<div class="col-md-8">
				<input type="text" name="longitude"
					value="<?php echo ($this->input->post('longitude') ? $this->input->post('longitude') : $hr_employee['longitude']); ?>"
					class="form-control" id="longitude" />
			</div>
		</div>
		<div class="form-group">
			<label for="Fathers Name" class="col-md-4 control-label">Fathers Name</label>
			<div class="col-md-8">
				<input type="text" name="fathers_name"
					value="<?php echo ($this->input->post('fathers_name') ? $this->input->post('fathers_name') : $hr_employee['fathers_name']); ?>"
					class="form-control" id="fathers_name" />
			</div>
		</div>
		<div class="form-group">
			<label for="Mothers Name" class="col-md-4 control-label">Mothers Name</label>
			<div class="col-md-8">
				<input type="text" name="mothers_name"
					value="<?php echo ($this->input->post('mothers_name') ? $this->input->post('mothers_name') : $hr_employee['mothers_name']); ?>"
					class="form-control" id="mothers_name" />
			</div>
		</div>
		<div class="form-group">
			<label for="Home District" class="col-md-4 control-label">Home
				District</label>
			<div class="col-md-8">
				<input type="text" name="home_district"
					value="<?php echo ($this->input->post('home_district') ? $this->input->post('home_district') : $hr_employee['home_district']); ?>"
					class="form-control" id="home_district" />
			</div>
		</div>
		<div class="form-group">
			<label for="Spouse Occupation" class="col-md-4 control-label">Spouse
				Occupation</label>
			<div class="col-md-8">
				<input type="text" name="spouse_occupation"
					value="<?php echo ($this->input->post('spouse_occupation') ? $this->input->post('spouse_occupation') : $hr_employee['spouse_occupation']); ?>"
					class="form-control" id="spouse_occupation" />
			</div>
		</div>
		<div class="form-group">
			<label for="Spouse District" class="col-md-4 control-label">Spouse
				District</label>
			<div class="col-md-8">
				<input type="text" name="spouse_district"
					value="<?php echo ($this->input->post('spouse_district') ? $this->input->post('spouse_district') : $hr_employee['spouse_district']); ?>"
					class="form-control" id="spouse_district" />
			</div>
		</div>
		<div class="form-group">
			<label for="Religion" class="col-md-4 control-label">Religion</label>
			<div class="col-md-8">
				<input type="text" name="religion"
					value="<?php echo ($this->input->post('religion') ? $this->input->post('religion') : $hr_employee['religion']); ?>"
					class="form-control" id="religion" />
			</div>
		</div>
		<div class="form-group">
			<label for="Date Joining" class="col-md-4 control-label">Date Joining</label>
			<div class="col-md-8">
				<input type="text" name="date_joining" id="date_joining"
					value="<?php echo ($this->input->post('date_joining') ? $this->input->post('date_joining') : $hr_employee['date_joining']); ?>"
					class="form-control-static datepicker" />
			</div>
		</div>
		<div class="form-group">
			<label for="Entry Designation" class="col-md-4 control-label">Entry
				Designation</label>
			<div class="col-md-8">
				<input type="text" name="entry_designation"
					value="<?php echo ($this->input->post('entry_designation') ? $this->input->post('entry_designation') : $hr_employee['entry_designation']); ?>"
					class="form-control" id="entry_designation" />
			</div>
		</div>
		<div class="form-group">
			<label for="Entry Scale" class="col-md-4 control-label">Entry Scale</label>
			<div class="col-md-8">
				<input type="text" name="entry_scale"
					value="<?php echo ($this->input->post('entry_scale') ? $this->input->post('entry_scale') : $hr_employee['entry_scale']); ?>"
					class="form-control" id="entry_scale" />
			</div>
		</div>
		<div class="form-group">
			<label for="Picture" class="col-md-4 control-label">Picture</label>
			<div class="col-md-8">
				<input type="text" name="picture"
					value="<?php echo ($this->input->post('picture') ? $this->input->post('picture') : $hr_employee['picture']); ?>"
					class="form-control" id="picture" />
			</div>
		</div>
		<div class="form-group">
			<label for="Archive Status" class="col-md-4 control-label">Archive
				Status</label>
			<div class="col-md-8">
				<input type="text" name="archive_status"
					value="<?php echo ($this->input->post('archive_status') ? $this->input->post('archive_status') : $hr_employee['archive_status']); ?>"
					class="form-control" id="archive_status" />
			</div>
		</div>
		<div class="form-group">
			<label for="Status" class="col-md-4 control-label">Status</label>
			<div class="col-md-8">
				<input type="text" name="status"
					value="<?php echo ($this->input->post('status') ? $this->input->post('status') : $hr_employee['status']); ?>"
					class="form-control" id="status" />
			</div>
		</div>

	</div>
</div>
<div class="form-group">
	<div class="col-sm-offset-4 col-sm-8">
		<button type="submit" class="btn btn-success"><?php if(empty($hr_employee['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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
