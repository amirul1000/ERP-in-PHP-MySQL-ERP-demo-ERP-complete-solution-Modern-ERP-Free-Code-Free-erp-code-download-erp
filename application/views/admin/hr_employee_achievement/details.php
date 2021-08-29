<a href="<?php echo site_url('admin/hr_employee_achievement/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Hr_employee_achievement'); ?></h5>
<!--Data display of hr_employee_achievement with id-->
<?php
$c = $hr_employee_achievement;
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>Points To Hr Employee</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Hr_employee_model');
$dataArr = $this->CI->Hr_employee_model->get_hr_employee($c['points_to_hr_employee_id']);
echo $dataArr['first_name'];
?>
									</td>
	</tr>

	<tr>
		<td>Points By Hr Employee</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Hr_employee_model');
$dataArr = $this->CI->Hr_employee_model->get_hr_employee($c['points_by_hr_employee_id']);
echo $dataArr['first_name'];
?>
									</td>
	</tr>

	<tr>
		<td>Description</td>
		<td><?php echo $c['description']; ?></td>
	</tr>

	<tr>
		<td>No Of Units Completed</td>
		<td><?php echo $c['no_of_units_completed']; ?></td>
	</tr>

	<tr>
		<td>Points On Unit Task</td>
		<td><?php echo $c['points_on_unit_task']; ?></td>
	</tr>

	<tr>
		<td>Date Achivement</td>
		<td><?php echo $c['date_achivement']; ?></td>
	</tr>

	<tr>
		<td>Total Units Points</td>
		<td><?php echo $c['total_units_points']; ?></td>
	</tr>


</table>
<!--End of Data display of hr_employee_achievement with id//-->
