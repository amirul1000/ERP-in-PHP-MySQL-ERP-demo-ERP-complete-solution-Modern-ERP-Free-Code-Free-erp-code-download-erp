<a href="<?php echo site_url('admin/hr_servicehistory/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Hr_servicehistory'); ?></h5>
<!--Data display of hr_servicehistory with id-->
<?php
$c = $hr_servicehistory;
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
		<td>Designation</td>
		<td><?php echo $c['designation']; ?></td>
	</tr>

	<tr>
		<td>Office Name</td>
		<td><?php echo $c['office_name']; ?></td>
	</tr>

	<tr>
		<td>Section</td>
		<td><?php echo $c['section']; ?></td>
	</tr>

	<tr>
		<td>Date From</td>
		<td><?php echo $c['date_from']; ?></td>
	</tr>


</table>
<!--End of Data display of hr_servicehistory with id//-->
