<a href="<?php echo site_url('admin/hr_employee/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Hr_employee'); ?></h5>
<!--Data display of hr_employee with id-->
<?php
$c = $hr_employee;
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>Users</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Users_model');
$dataArr = $this->CI->Users_model->get_users($c['users_id']);
echo $dataArr['email'];
?>
									</td>
	</tr>

	<tr>
		<td>First Name</td>
		<td><?php echo $c['first_name']; ?></td>
	</tr>

	<tr>
		<td>Last Name</td>
		<td><?php echo $c['last_name']; ?></td>
	</tr>

	<tr>
		<td>Gender</td>
		<td><?php echo $c['gender']; ?></td>
	</tr>

	<tr>
		<td>Date Of Birth</td>
		<td><?php echo $c['date_of_birth']; ?></td>
	</tr>

	<tr>
		<td>Nationa</td>
		<td><?php echo $c['nationalid']; ?></td>
	</tr>

	<tr>
		<td>Blood Group</td>
		<td><?php echo $c['blood_group']; ?></td>
	</tr>

	<tr>
		<td>Marital Status</td>
		<td><?php echo $c['marital_status']; ?></td>
	</tr>

	<tr>
		<td>Name Spouse</td>
		<td><?php echo $c['name_spouse']; ?></td>
	</tr>

	<tr>
		<td>Email</td>
		<td><?php echo $c['email']; ?></td>
	</tr>

	<tr>
		<td>Cell Phone</td>
		<td><?php echo $c['cell_phone']; ?></td>
	</tr>

	<tr>
		<td>Land Phone</td>
		<td><?php echo $c['land_phone']; ?></td>
	</tr>

	<tr>
		<td>Country</td>
		<td><?php echo $c['country']; ?></td>
	</tr>

	<tr>
		<td>State</td>
		<td><?php echo $c['state']; ?></td>
	</tr>

	<tr>
		<td>City</td>
		<td><?php echo $c['city']; ?></td>
	</tr>

	<tr>
		<td>Zip Code</td>
		<td><?php echo $c['zip_code']; ?></td>
	</tr>

	<tr>
		<td>Permanent Address</td>
		<td><?php echo $c['permanent_address']; ?></td>
	</tr>

	<tr>
		<td>About</td>
		<td><?php echo $c['about']; ?></td>
	</tr>

	<tr>
		<td>Contact Details</td>
		<td><?php echo $c['contact_details']; ?></td>
	</tr>

	<tr>
		<td>Latitude</td>
		<td><?php echo $c['latitude']; ?></td>
	</tr>

	<tr>
		<td>Longitude</td>
		<td><?php echo $c['longitude']; ?></td>
	</tr>

	<tr>
		<td>Fathers Name</td>
		<td><?php echo $c['fathers_name']; ?></td>
	</tr>

	<tr>
		<td>Mothers Name</td>
		<td><?php echo $c['mothers_name']; ?></td>
	</tr>

	<tr>
		<td>Home District</td>
		<td><?php echo $c['home_district']; ?></td>
	</tr>

	<tr>
		<td>Spouse Occupation</td>
		<td><?php echo $c['spouse_occupation']; ?></td>
	</tr>

	<tr>
		<td>Spouse District</td>
		<td><?php echo $c['spouse_district']; ?></td>
	</tr>

	<tr>
		<td>Religion</td>
		<td><?php echo $c['religion']; ?></td>
	</tr>

	<tr>
		<td>Date Joining</td>
		<td><?php echo $c['date_joining']; ?></td>
	</tr>

	<tr>
		<td>Entry Designation</td>
		<td><?php echo $c['entry_designation']; ?></td>
	</tr>

	<tr>
		<td>Entry Scale</td>
		<td><?php echo $c['entry_scale']; ?></td>
	</tr>

	<tr>
		<td>Picture</td>
		<td><?php echo $c['picture']; ?></td>
	</tr>

	<tr>
		<td>Archive Status</td>
		<td><?php echo $c['archive_status']; ?></td>
	</tr>

	<tr>
		<td>Status</td>
		<td><?php echo $c['status']; ?></td>
	</tr>


</table>
<!--End of Data display of hr_employee with id//-->
