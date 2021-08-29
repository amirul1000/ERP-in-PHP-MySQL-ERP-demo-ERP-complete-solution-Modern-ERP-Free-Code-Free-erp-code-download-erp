<a href="<?php echo site_url('admin/attendance_in_out_track/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Attendance_in_out_track'); ?></h5>
<!--Data display of attendance_in_out_track with id-->
<?php
$c = $attendance_in_out_track;
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>Time Occure</td>
		<td><?php echo $c['time_occure']; ?></td>
	</tr>

	<tr>
		<td>In Out</td>
		<td><?php echo $c['in_out']; ?></td>
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
		<td>Attendance Attendance</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Attendance_attendance_model');
$dataArr = $this->CI->Attendance_attendance_model->get_attendance_attendance($c['attendance_attendance_id']);
echo $dataArr['enterance_date'];
?>
									</td>
	</tr>


</table>
<!--End of Data display of attendance_in_out_track with id//-->
