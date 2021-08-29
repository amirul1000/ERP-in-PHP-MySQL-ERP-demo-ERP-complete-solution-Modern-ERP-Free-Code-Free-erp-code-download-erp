<a
	href="<?php echo site_url('admin/utility_taskunitspointsbasemodel/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Utility_taskunitspointsbasemodel'); ?></h5>
<!--Data display of utility_taskunitspointsbasemodel with id-->
<?php
$c = $utility_taskunitspointsbasemodel;
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>Total Units Task</td>
		<td><?php echo $c['total_units_task']; ?></td>
	</tr>

	<tr>
		<td>Unit Task Description</td>
		<td><?php echo $c['unit_task_description']; ?></td>
	</tr>

	<tr>
		<td>Points On Unit Task</td>
		<td><?php echo $c['points_on_unit_task']; ?></td>
	</tr>


</table>
<!--End of Data display of utility_taskunitspointsbasemodel with id//-->
