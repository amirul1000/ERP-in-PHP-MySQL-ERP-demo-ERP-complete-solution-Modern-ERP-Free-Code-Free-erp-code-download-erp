<a href="<?php echo site_url('admin/inventory_category/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Inventory_category'); ?></h5>
<!--Data display of inventory_category with id-->
<?php
$c = $inventory_category;
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>Description</td>
		<td><?php echo $c['description']; ?></td>
	</tr>

	<tr>
		<td>Slug</td>
		<td><?php echo $c['slug']; ?></td>
	</tr>

	<tr>
		<td>Name</td>
		<td><?php echo $c['name']; ?></td>
	</tr>

	<tr>
		<td>Parent Inventory Category</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Inventory_category_model');
$dataArr = $this->CI->Inventory_category_model->get_inventory_category($c['parent_inventory_category_id']);
echo $dataArr['description'];
?>
									</td>
	</tr>


</table>
<!--End of Data display of inventory_category with id//-->
