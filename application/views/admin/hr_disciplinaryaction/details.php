<a href="<?php echo site_url('admin/hr_disciplinaryaction/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Hr_disciplinaryaction'); ?></h5>
<!--Data display of hr_disciplinaryaction with id-->
<?php
$c = $hr_disciplinaryaction;
?>
<table class="table table-striped table-bordered">
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
		<td>Nature Offence</td>
		<td><?php echo $c['nature_offence']; ?></td>
	</tr>

	<tr>
		<td>Punishment</td>
		<td><?php echo $c['punishment']; ?></td>
	</tr>

	<tr>
		<td>Date</td>
		<td><?php echo $c['date']; ?></td>
	</tr>


</table>
<!--End of Data display of hr_disciplinaryaction with id//-->
