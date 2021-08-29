<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Marketing_smtp'); ?></h5>
<?php
echo $this->session->flashdata('msg');
?>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/marketing_smtp/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type"
			class="select"
			onChange="window.location='<?php echo site_url('admin/marketing_smtp/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/marketing_smtp/search/',array("class"=>"form-horizontal")); ?>
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

<!--Data display of marketing_smtp-->
<table class="table table-striped table-bordered">
	<tr>
		<th>Smtp Name</th>
		<th>Host</th>
		<th>Email</th>
		<th>Password</th>
		<th>Port</th>
		<th>Status</th>

		<th>Actions</th>
	</tr>
	<?php foreach($marketing_smtp as $c){ ?>
    <tr>
		<td><?php echo $c['smtp_name']; ?></td>
		<td><?php echo $c['host']; ?></td>
		<td><?php echo $c['email']; ?></td>
		<td><?php echo $c['password']; ?></td>
		<td><?php echo $c['port']; ?></td>
		<td><?php echo $c['status']; ?></td>

		<td><a
			href="<?php echo site_url('admin/marketing_smtp/details/'.$c['id']); ?>"
			class="action-icon"> <i class="zmdi zmdi-eye"></i></a> <a
			href="<?php echo site_url('admin/marketing_smtp/save/'.$c['id']); ?>"
			class="action-icon"> <i class="zmdi zmdi-edit"></i></a> <a
			href="<?php echo site_url('admin/marketing_smtp/remove/'.$c['id']); ?>"
			onClick="return confirm('Are you sure to delete this item?');"
			class="action-icon"> <i class="zmdi zmdi-delete"></i></a></td>
	</tr>
	<?php } ?>
</table>
<!--End of Data display of marketing_smtp//-->

<!--No data-->
<?php
if (count($marketing_smtp) == 0) {
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
