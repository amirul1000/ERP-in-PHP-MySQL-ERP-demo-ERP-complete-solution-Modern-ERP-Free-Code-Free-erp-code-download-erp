<a
	href="<?php echo site_url('admin/inventory_warehousemanager/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Inventory_warehousemanager'); ?></h5>
<!--Data display of inventory_warehousemanager with id-->
<?php
$c = $inventory_warehousemanager;
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>Appointed Date</td>
		<td><?php echo $c['appointed_date']; ?></td>
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
		<td>Manager Hr Employee</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Hr_employee_model');
$dataArr = $this->CI->Hr_employee_model->get_hr_employee($c['manager_hr_employee_id']);
echo $dataArr['first_name'];
?>
									</td>
	</tr>

	<tr>
		<td>Inventory Warehouse</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Inventory_warehouse_model');
$dataArr = $this->CI->Inventory_warehouse_model->get_inventory_warehouse($c['inventory_warehouse_id']);
echo $dataArr['created_on'];
?>
									</td>
	</tr>


</table>
<!--End of Data display of inventory_warehousemanager with id//-->
