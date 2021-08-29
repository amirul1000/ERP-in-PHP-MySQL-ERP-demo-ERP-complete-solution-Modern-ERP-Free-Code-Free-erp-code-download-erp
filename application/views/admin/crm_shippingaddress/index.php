<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Crm_shippingaddress'); ?></h5>
<?php
echo $this->session->flashdata('msg');
?>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/crm_shippingaddress/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type"
			class="select"
			onChange="window.location='<?php echo site_url('admin/crm_shippingaddress/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/crm_shippingaddress/search/',array("class"=>"form-horizontal")); ?>
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

<!--Data display of crm_shippingaddress-->
<table class="table table-striped table-bordered">
	<tr>
		<th>Address1</th>
		<th>Address2</th>
		<th>Country</th>
		<th>State</th>
		<th>City</th>
		<th>Zip Code</th>

		<th>Actions</th>
	</tr>
	<?php foreach($crm_shippingaddress as $c){ ?>
    <tr>
		<td><?php echo $c['address1']; ?></td>
		<td><?php echo $c['address2']; ?></td>
		<td><?php echo $c['country']; ?></td>
		<td><?php echo $c['state']; ?></td>
		<td><?php echo $c['city']; ?></td>
		<td><?php echo $c['zip_code']; ?></td>

		<td><a
			href="<?php echo site_url('admin/crm_shippingaddress/details/'.$c['id']); ?>"
			class="action-icon"> <i class="zmdi zmdi-eye"></i></a> <a
			href="<?php echo site_url('admin/crm_shippingaddress/save/'.$c['id']); ?>"
			class="action-icon"> <i class="zmdi zmdi-edit"></i></a> <a
			href="<?php echo site_url('admin/crm_shippingaddress/remove/'.$c['id']); ?>"
			onClick="return confirm('Are you sure to delete this item?');"
			class="action-icon"> <i class="zmdi zmdi-delete"></i></a></td>
	</tr>
	<?php } ?>
</table>
<!--End of Data display of crm_shippingaddress//-->

<!--No data-->
<?php
if (count($crm_shippingaddress) == 0) {
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
