<a href="<?php echo site_url('admin/inventory_warehouse/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Inventory_warehouse'); ?></h5>
<!--Data display of inventory_warehouse with id-->
<?php
$c = $inventory_warehouse;
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>Created On</td>
		<td><?php echo $c['created_on']; ?></td>
	</tr>

	<tr>
		<td>Modified On</td>
		<td><?php echo $c['modified_on']; ?></td>
	</tr>

	<tr>
		<td>Code</td>
		<td><?php echo $c['code']; ?></td>
	</tr>

	<tr>
		<td>Name</td>
		<td><?php echo $c['name']; ?></td>
	</tr>

	<tr>
		<td>Location</td>
		<td><?php echo $c['location']; ?></td>
	</tr>

	<tr>
		<td>Date Start</td>
		<td><?php echo $c['date_start']; ?></td>
	</tr>

	<tr>
		<td>Date End</td>
		<td><?php echo $c['date_end']; ?></td>
	</tr>

	<tr>
		<td>Status</td>
		<td><?php echo $c['status']; ?></td>
	</tr>

	<tr>
		<td>Created By Users</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Users_model');
$dataArr = $this->CI->Users_model->get_users($c['created_by_users_id']);
echo $dataArr['email'];
?>
									</td>
	</tr>

	<tr>
		<td>Modified By Users</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Users_model');
$dataArr = $this->CI->Users_model->get_users($c['modified_by_users_id']);
echo $dataArr['email'];
?>
									</td>
	</tr>


</table>
<!--End of Data display of inventory_warehouse with id//-->
