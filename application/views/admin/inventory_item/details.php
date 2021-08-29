<a href="<?php echo site_url('admin/inventory_item/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Inventory_item'); ?></h5>
<!--Data display of inventory_item with id-->
<?php
$c = $inventory_item;
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>Name</td>
		<td><?php echo $c['name']; ?></td>
	</tr>

	<tr>
		<td>Brand</td>
		<td><?php echo $c['brand']; ?></td>
	</tr>

	<tr>
		<td>Model</td>
		<td><?php echo $c['model']; ?></td>
	</tr>

	<tr>
		<td>Item Quantity</td>
		<td><?php echo $c['item_quantity']; ?></td>
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
		<td>Inventory Category</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Inventory_category_model');
$dataArr = $this->CI->Inventory_category_model->get_inventory_category($c['inventory_category_id']);
echo $dataArr['description'];
?>
									</td>
	</tr>

	<tr>
		<td>Item Utility Unit</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Utility_unit_model');
$dataArr = $this->CI->Utility_unit_model->get_utility_unit($c['item_utility_unit_id']);
echo $dataArr['name'];
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

	<tr>
		<td>Orginal Price</td>
		<td><?php echo $c['orginal_price']; ?></td>
	</tr>

	<tr>
		<td>Sale Price</td>
		<td><?php echo $c['sale_price']; ?></td>
	</tr>


</table>
<!--End of Data display of inventory_item with id//-->
