<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Inventory_buyproducts'); ?></h5>
<?php
echo $this->session->flashdata('msg');
?>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/inventory_buyproducts/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type"
			class="select"
			onChange="window.location='<?php echo site_url('admin/inventory_buyproducts/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/inventory_buyproducts/search/',array("class"=>"form-horizontal")); ?>
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

<!--Data display of inventory_buyproducts-->
<table class="table table-striped table-bordered">
	<tr>
		<th>Quantity</th>
		<th>Discount</th>
		<th>Tax</th>
		<th>Date Added</th>
		<th>Slug</th>
		<th>Inventory Buy</th>
		<th>Inventory Item</th>
		<th>Utility Unit</th>

		<th>Actions</th>
	</tr>
	<?php foreach($inventory_buyproducts as $c){ ?>
    <tr>
		<td><?php echo $c['quantity']; ?></td>
		<td><?php echo $c['discount']; ?></td>
		<td><?php echo $c['tax']; ?></td>
		<td><?php echo $c['date_added']; ?></td>
		<td><?php echo $c['slug']; ?></td>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Inventory_buy_model');
    $dataArr = $this->CI->Inventory_buy_model->get_inventory_buy($c['inventory_buy_id']);
    echo $dataArr['status'];
    ?>
									</td>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Inventory_item_model');
    $dataArr = $this->CI->Inventory_item_model->get_inventory_item($c['inventory_item_id']);
    echo $dataArr['name'];
    ?>
									</td>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Utility_unit_model');
    $dataArr = $this->CI->Utility_unit_model->get_utility_unit($c['utility_unit_id']);
    echo $dataArr['name'];
    ?>
									</td>

		<td><a
			href="<?php echo site_url('admin/inventory_buyproducts/details/'.$c['id']); ?>"
			class="action-icon"> <i class="zmdi zmdi-eye"></i></a> <a
			href="<?php echo site_url('admin/inventory_buyproducts/save/'.$c['id']); ?>"
			class="action-icon"> <i class="zmdi zmdi-edit"></i></a> <a
			href="<?php echo site_url('admin/inventory_buyproducts/remove/'.$c['id']); ?>"
			onClick="return confirm('Are you sure to delete this item?');"
			class="action-icon"> <i class="zmdi zmdi-delete"></i></a></td>
	</tr>
	<?php } ?>
</table>
<!--End of Data display of inventory_buyproducts//-->

<!--No data-->
<?php
if (count($inventory_buyproducts) == 0) {
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
