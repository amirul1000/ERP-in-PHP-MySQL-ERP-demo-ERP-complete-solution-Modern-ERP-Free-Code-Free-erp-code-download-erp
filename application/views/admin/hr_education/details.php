<a href="<?php echo site_url('admin/hr_education/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Hr_education'); ?></h5>
<!--Data display of hr_education with id-->
<?php
$c = $hr_education;
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
		<td>Name Institution</td>
		<td><?php echo $c['name_institution']; ?></td>
	</tr>

	<tr>
		<td>Principals Subject</td>
		<td><?php echo $c['principals_subject']; ?></td>
	</tr>

	<tr>
		<td>Degree</td>
		<td><?php echo $c['degree']; ?></td>
	</tr>

	<tr>
		<td>Year</td>
		<td><?php echo $c['year']; ?></td>
	</tr>

	<tr>
		<td>Division</td>
		<td><?php echo $c['division']; ?></td>
	</tr>


</table>
<!--End of Data display of hr_education with id//-->
