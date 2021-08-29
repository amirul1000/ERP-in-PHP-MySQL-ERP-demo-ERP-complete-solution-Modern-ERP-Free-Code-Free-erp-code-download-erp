<a
	href="<?php echo site_url('admin/utility_schedulebasemodel/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Utility_schedulebasemodel'); ?></h5>
<!--Data display of utility_schedulebasemodel with id-->
<?php
$c = $utility_schedulebasemodel;
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>Subject</td>
		<td><?php echo $c['subject']; ?></td>
	</tr>

	<tr>
		<td>Description</td>
		<td><?php echo $c['description']; ?></td>
	</tr>

	<tr>
		<td>Date From</td>
		<td><?php echo $c['date_from']; ?></td>
	</tr>

	<tr>
		<td>Time From</td>
		<td><?php echo $c['time_from']; ?></td>
	</tr>

	<tr>
		<td>Date To</td>
		<td><?php echo $c['date_to']; ?></td>
	</tr>

	<tr>
		<td>Time To</td>
		<td><?php echo $c['time_to']; ?></td>
	</tr>


</table>
<!--End of Data display of utility_schedulebasemodel with id//-->
