<a
	href="<?php echo site_url('admin/attendance_leaveapplication/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Attendance_leaveapplication'); ?></h5>
<!--Data display of attendance_leaveapplication with id-->
<?php
$c = $attendance_leaveapplication;
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
		<td>Hr Employee</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Hr_employee_model');
$dataArr = $this->CI->Hr_employee_model->get_hr_employee($c['hr_employee_id']);
echo $dataArr['first_name'];
?>
									</td>
	</tr>

	<tr>
		<td>Manager Hr Employee</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Hr_employee_model');
$dataArr = $this->CI->Hr_employee_model->get_hr_employee($c['manager_hr_employee_id']);
echo $dataArr['first_name'];
?>
									</td>
	</tr>


</table>
<!--End of Data display of attendance_leaveapplication with id//-->
