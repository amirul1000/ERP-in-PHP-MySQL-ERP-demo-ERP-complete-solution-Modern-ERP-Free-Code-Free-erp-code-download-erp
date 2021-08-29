<a href="<?php echo site_url('admin/inventory_saleproducts/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Inventory_saleproducts'); ?></h5>
<!--Data display of inventory_saleproducts with id-->
<?php
$c = $inventory_saleproducts;
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>Quantity</td>
		<td><?php echo $c['quantity']; ?></td>
	</tr>

	<tr>
		<td>Discount</td>
		<td><?php echo $c['discount']; ?></td>
	</tr>

	<tr>
		<td>Tax</td>
		<td><?php echo $c['tax']; ?></td>
	</tr>

	<tr>
		<td>Date Added</td>
		<td><?php echo $c['date_added']; ?></td>
	</tr>

	<tr>
		<td>Slug</td>
		<td><?php echo $c['slug']; ?></td>
	</tr>

	<tr>
		<td>Inventory Item</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Inventory_item_model');
$dataArr = $this->CI->Inventory_item_model->get_inventory_item($c['inventory_item_id']);
echo $dataArr['name'];
?>
									</td>
	</tr>

	<tr>
		<td>Inventory Sale</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Inventory_sale_model');
$dataArr = $this->CI->Inventory_sale_model->get_inventory_sale($c['inventory_sale_id']);
echo $dataArr['created_on'];
?>
									</td>
	</tr>

	<tr>
		<td>Utility Unit</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Utility_unit_model');
$dataArr = $this->CI->Utility_unit_model->get_utility_unit($c['utility_unit_id']);
echo $dataArr['name'];
?>
									</td>
	</tr>


</table>
<!--End of Data display of inventory_saleproducts with id//-->
