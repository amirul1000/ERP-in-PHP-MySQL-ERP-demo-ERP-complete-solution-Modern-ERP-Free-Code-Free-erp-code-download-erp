<a href="<?php echo site_url('admin/marketing_smtp/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Marketing_smtp'); ?></h5>
<!--Data display of marketing_smtp with id-->
<?php
$c = $marketing_smtp;
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>Smtp Name</td>
		<td><?php echo $c['smtp_name']; ?></td>
	</tr>

	<tr>
		<td>Host</td>
		<td><?php echo $c['host']; ?></td>
	</tr>

	<tr>
		<td>Email</td>
		<td><?php echo $c['email']; ?></td>
	</tr>

	<tr>
		<td>Password</td>
		<td><?php echo $c['password']; ?></td>
	</tr>

	<tr>
		<td>Port</td>
		<td><?php echo $c['port']; ?></td>
	</tr>

	<tr>
		<td>Status</td>
		<td><?php echo $c['status']; ?></td>
	</tr>

	<tr>
		<td>Created At</td>
		<td><?php echo $c['created_at']; ?></td>
	</tr>

	<tr>
		<td>Updated At</td>
		<td><?php echo $c['updated_at']; ?></td>
	</tr>


</table>
<!--End of Data display of marketing_smtp with id//-->
