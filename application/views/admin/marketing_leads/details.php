<a href="<?php echo site_url('admin/marketing_leads/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Marketing_leads'); ?></h5>
<!--Data display of marketing_leads with id-->
<?php
$c = $marketing_leads;
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
		<td>Address</td>
		<td><?php echo $c['address']; ?></td>
	</tr>

	<tr>
		<td>Created At</td>
		<td><?php echo $c['created_at']; ?></td>
	</tr>

	<tr>
		<td>Updated At</td>
		<td><?php echo $c['updated_at']; ?></td>
	</tr>

	<tr>
		<td>Status</td>
		<td><?php echo $c['status']; ?></td>
	</tr>


</table>
<!--End of Data display of marketing_leads with id//-->
