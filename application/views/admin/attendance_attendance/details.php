<a href="<?php echo site_url('admin/attendance_attendance/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Attendance_attendance'); ?></h5>
<!--Data display of attendance_attendance with id-->
<?php
$c = $attendance_attendance;
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>Enterance Date</td>
		<td><?php echo $c['enterance_date']; ?></td>
	</tr>

	<tr>
		<td>Enterance Time</td>
		<td><?php echo $c['enterance_time']; ?></td>
	</tr>

	<tr>
		<td>Deperature Date</td>
		<td><?php echo $c['deperature_date']; ?></td>
	</tr>

	<tr>
		<td>Deperature Time</td>
		<td><?php echo $c['deperature_time']; ?></td>
	</tr>

	<tr>
		<td>Entry Card Status</td>
		<td><?php echo $c['entry_card_status']; ?></td>
	</tr>

	<tr>
		<td>Comments</td>
		<td><?php echo $c['comments']; ?></td>
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


</table>
<!--End of Data display of attendance_attendance with id//-->
