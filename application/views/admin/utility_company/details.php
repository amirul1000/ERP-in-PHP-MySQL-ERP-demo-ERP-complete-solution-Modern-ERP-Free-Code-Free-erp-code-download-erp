<a href="<?php echo site_url('admin/utility_company/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Utility_company'); ?></h5>
<!--Data display of utility_company with id-->
<?php
$c = $utility_company;
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>Name</td>
		<td><?php echo $c['name']; ?></td>
	</tr>

	<tr>
		<td>Description</td>
		<td><?php echo $c['description']; ?></td>
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
		<td>Year Established</td>
		<td><?php echo $c['year_established']; ?></td>
	</tr>

	<tr>
		<td>Total Employees</td>
		<td><?php echo $c['total_employees']; ?></td>
	</tr>

	<tr>
		<td>Business Type</td>
		<td><?php echo $c['business_type']; ?></td>
	</tr>

	<tr>
		<td>Main Products</td>
		<td><?php echo $c['main_products']; ?></td>
	</tr>

	<tr>
		<td>Total Annual Revenue</td>
		<td><?php echo $c['total_annual_revenue']; ?></td>
	</tr>

	<tr>
		<td>Url</td>
		<td><?php echo $c['url']; ?></td>
	</tr>

	<tr>
		<td>Social Link</td>
		<td><?php echo $c['social_link']; ?></td>
	</tr>


</table>
<!--End of Data display of utility_company with id//-->
