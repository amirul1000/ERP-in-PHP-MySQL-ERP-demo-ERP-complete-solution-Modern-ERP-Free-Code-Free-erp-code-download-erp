<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Inventory_item'); ?></h5>
<?php
echo $this->session->flashdata('msg');
?>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/inventory_item/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type"
			class="select"
			onChange="window.location='<?php echo site_url('admin/inventory_item/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/inventory_item/search/',array("class"=>"form-horizontal")); ?>
                    <input name="key" type="text"
				value="<?php echo isset($key)?$key:'';?>" placeholder="Search..."
				class="form-control">
				<button type="submit" class="mr-0">
					<i class="fa fa-search"></i>
				</button>
                <?php echo form_close(); ?>
            </li>
		</ul>
	</div>
</div>
<!--End of Action//-->

<!--Data display of inventory_item-->
<table class="table table-striped table-bordered">
	<tr>
		<th>Name</th>
		<th>Brand</th>
		<th>Model</th>
		<th>Item Quantity</th>
		<th>Date Added</th>
		<th>Slug</th>
		<th>Inventory Category</th>
		<th>Item Utility Unit</th>
		<th>Inventory Warehouse</th>
		<th>Orginal Price</th>
		<th>Sale Price</th>

		<th>Actions</th>
	</tr>
	<?php foreach($inventory_item as $c){ ?>
    <tr>
		<td><?php echo $c['name']; ?></td>
		<td><?php echo $c['brand']; ?></td>
		<td><?php echo $c['model']; ?></td>
		<td><?php echo $c['item_quantity']; ?></td>
		<td><?php echo $c['date_added']; ?></td>
		<td><?php echo $c['slug']; ?></td>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Inventory_category_model');
    $dataArr = $this->CI->Inventory_category_model->get_inventory_category($c['inventory_category_id']);
    echo $dataArr['description'];
    ?>
									</td>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Utility_unit_model');
    $dataArr = $this->CI->Utility_unit_model->get_utility_unit($c['item_utility_unit_id']);
    echo $dataArr['name'];
    ?>
									</td>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Inventory_warehouse_model');
    $dataArr = $this->CI->Inventory_warehouse_model->get_inventory_warehouse($c['inventory_warehouse_id']);
    echo $dataArr['created_on'];
    ?>
									</td>
		<td><?php echo $c['orginal_price']; ?></td>
		<td><?php echo $c['sale_price']; ?></td>

		<td><a
			href="<?php echo site_url('admin/inventory_item/details/'.$c['id']); ?>"
			class="action-icon"> <i class="zmdi zmdi-eye"></i></a> <a
			href="<?php echo site_url('admin/inventory_item/save/'.$c['id']); ?>"
			class="action-icon"> <i class="zmdi zmdi-edit"></i></a> <a
			href="<?php echo site_url('admin/inventory_item/remove/'.$c['id']); ?>"
			onClick="return confirm('Are you sure to delete this item?');"
			class="action-icon"> <i class="zmdi zmdi-delete"></i></a></td>
	</tr>
	<?php } ?>
</table>
<!--End of Data display of inventory_item//-->

<!--No data-->
<?php
if (count($inventory_item) == 0) {
    ?>
<div align="center">
	<h3>Data is not exists</h3>
</div>
<?php
}
?>
<!--End of No data//-->

<!--Pagination-->
<?php
echo $link;
?>
<!--End of Pagination//-->
