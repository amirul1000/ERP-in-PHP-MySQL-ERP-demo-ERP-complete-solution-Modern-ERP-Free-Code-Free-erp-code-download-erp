<a href="<?php echo site_url('admin/hr_address/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Hr_address'); ?></h5>
<!--Data display of hr_address with id-->
<?php
$c = $hr_address;
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
		<td>Road Village</td>
		<td><?php echo $c['road_village']; ?></td>
	</tr>

	<tr>
		<td>Postoffice</td>
		<td><?php echo $c['postoffice']; ?></td>
	</tr>

	<tr>
		<td>Post Code</td>
		<td><?php echo $c['post_code']; ?></td>
	</tr>

	<tr>
		<td>Flat No</td>
		<td><?php echo $c['flat_no']; ?></td>
	</tr>

	<tr>
		<td>Police Station Thana</td>
		<td><?php echo $c['police_station_thana']; ?></td>
	</tr>

	<tr>
		<td>District</td>
		<td><?php echo $c['district']; ?></td>
	</tr>

	<tr>
		<td>Date From</td>
		<td><?php echo $c['date_from']; ?></td>
	</tr>

	<tr>
		<td>Address Type</td>
		<td><?php echo $c['address_type']; ?></td>
	</tr>


</table>
<!--End of Data display of hr_address with id//-->
