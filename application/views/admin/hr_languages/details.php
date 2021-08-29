<a href="<?php echo site_url('admin/hr_languages/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Hr_languages'); ?></h5>
<!--Data display of hr_languages with id-->
<?php
$c = $hr_languages;
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
		<td>Languages</td>
		<td><?php echo $c['languages']; ?></td>
	</tr>

	<tr>
		<td>Read</td>
		<td><?php echo $c['read']; ?></td>
	</tr>

	<tr>
		<td>Write</td>
		<td><?php echo $c['write']; ?></td>
	</tr>

	<tr>
		<td>Speak</td>
		<td><?php echo $c['speak']; ?></td>
	</tr>


</table>
<!--End of Data display of hr_languages with id//-->
