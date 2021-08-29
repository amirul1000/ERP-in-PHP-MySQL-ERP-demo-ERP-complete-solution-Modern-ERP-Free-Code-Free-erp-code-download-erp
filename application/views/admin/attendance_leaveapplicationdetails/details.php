<a
	href="<?php echo site_url('admin/attendance_leaveapplicationdetails/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Attendance_leaveapplicationdetails'); ?></h5>
<!--Data display of attendance_leaveapplicationdetails with id-->
<?php
$c = $attendance_leaveapplicationdetails;
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>Comments</td>
		<td><?php echo $c['comments']; ?></td>
	</tr>

	<tr>
		<td>Comment By Users</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Users_model');
$dataArr = $this->CI->Users_model->get_users($c['comment_by_users_id']);
echo $dataArr['email'];
?>
									</td>
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
<!--End of Data display of attendance_leaveapplicationdetails with id//-->
