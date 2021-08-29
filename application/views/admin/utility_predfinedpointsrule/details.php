<a
	href="<?php echo site_url('admin/utility_predfinedpointsrule/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Utility_predfinedpointsrule'); ?></h5>
<!--Data display of utility_predfinedpointsrule with id-->
<?php
$c = $utility_predfinedpointsrule;
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
		<td>Units Points</td>
		<td><?php echo $c['units_points']; ?></td>
	</tr>

	<tr>
		<td>Task Description</td>
		<td><?php echo $c['task_description']; ?></td>
	</tr>

	<tr>
		<td>Comments</td>
		<td><?php echo $c['comments']; ?></td>
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
<!--End of Data display of utility_predfinedpointsrule with id//-->
