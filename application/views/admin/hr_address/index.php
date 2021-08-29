<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Hr_address'); ?></h5>
<?php
echo $this->session->flashdata('msg');
?>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/hr_address/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type"
			class="select"
			onChange="window.location='<?php echo site_url('admin/hr_address/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/hr_address/search/',array("class"=>"form-horizontal")); ?>
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

<!--Data display of hr_address-->
<table class="table table-striped table-bordered">
	<tr>
		<th>Hr Employee</th>
		<th>Road Village</th>
		<th>Postoffice</th>
		<th>Post Code</th>
		<th>Flat No</th>
		<th>Police Station Thana</th>
		<th>District</th>
		<th>Date From</th>
		<th>Address Type</th>

		<th>Actions</th>
	</tr>
	<?php foreach($hr_address as $c){ ?>
    <tr>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Hr_employee_model');
    $dataArr = $this->CI->Hr_employee_model->get_hr_employee($c['hr_employee_id']);
    echo $dataArr['first_name'];
    ?>
									</td>
		<td><?php echo $c['road_village']; ?></td>
		<td><?php echo $c['postoffice']; ?></td>
		<td><?php echo $c['post_code']; ?></td>
		<td><?php echo $c['flat_no']; ?></td>
		<td><?php echo $c['police_station_thana']; ?></td>
		<td><?php echo $c['district']; ?></td>
		<td><?php echo $c['date_from']; ?></td>
		<td><?php echo $c['address_type']; ?></td>

		<td><a
			href="<?php echo site_url('admin/hr_address/details/'.$c['id']); ?>"
			class="action-icon"> <i class="zmdi zmdi-eye"></i></a> <a
			href="<?php echo site_url('admin/hr_address/save/'.$c['id']); ?>"
			class="action-icon"> <i class="zmdi zmdi-edit"></i></a> <a
			href="<?php echo site_url('admin/hr_address/remove/'.$c['id']); ?>"
			onClick="return confirm('Are you sure to delete this item?');"
			class="action-icon"> <i class="zmdi zmdi-delete"></i></a></td>
	</tr>
	<?php } ?>
</table>
<!--End of Data display of hr_address//-->

<!--No data-->
<?php
if (count($hr_address) == 0) {
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
