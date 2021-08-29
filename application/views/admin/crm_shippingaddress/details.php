<a href="<?php echo site_url('admin/crm_shippingaddress/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Crm_shippingaddress'); ?></h5>
<!--Data display of crm_shippingaddress with id-->
<?php
$c = $crm_shippingaddress;
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>Address1</td>
		<td><?php echo $c['address1']; ?></td>
	</tr>

	<tr>
		<td>Address2</td>
		<td><?php echo $c['address2']; ?></td>
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


</table>
<!--End of Data display of crm_shippingaddress with id//-->
