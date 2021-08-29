<a href="<?php echo site_url('admin/attendance_leave/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Attendance_leave'); ?></h5>
<!--Data display of attendance_leave with id-->
<?php
$c = $attendance_leave;
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>Leave Type</td>
		<td><?php echo $c['leave_type']; ?></td>
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
		<td>End Date</td>
		<td><?php echo $c['end_date']; ?></td>
	</tr>

	<tr>
		<td>End Time</td>
		<td><?php echo $c['end_time']; ?></td>
	</tr>

	<tr>
		<td>Total In Hrs</td>
		<td><?php echo $c['total_in_hrs']; ?></td>
	</tr>

	<tr>
		<td>Comments</td>
		<td><?php echo $c['comments']; ?></td>
	</tr>

	<tr>
		<td>Status</td>
		<td><?php echo $c['status']; ?></td>
	</tr>

	<tr>
		<td>Attendance Leaveapplication</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Attendance_leaveapplication_model');
$dataArr = $this->CI->Attendance_leaveapplication_model->get_attendance_leaveapplication($c['attendance_leaveapplication_id']);
echo $dataArr['subject'];
?>
									</td>
	</tr>


</table>
<!--End of Data display of attendance_leave with id//-->
