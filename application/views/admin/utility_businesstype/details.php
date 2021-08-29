<a href="<?php echo site_url('admin/utility_businesstype/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Utility_businesstype'); ?></h5>
<!--Data display of utility_businesstype with id-->
<?php
$c = $utility_businesstype;
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


</table>
<!--End of Data display of utility_businesstype with id//-->
