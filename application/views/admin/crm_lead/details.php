<a href="<?php echo site_url('admin/crm_lead/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Crm_lead'); ?></h5>
<!--Data display of crm_lead with id-->
<?php
$c = $crm_lead;
?>
<table class="table table-striped table-bordered">
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
		<td>Date Entry</td>
		<td><?php echo $c['date_entry']; ?></td>
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
<!--End of Data display of crm_lead with id//-->
