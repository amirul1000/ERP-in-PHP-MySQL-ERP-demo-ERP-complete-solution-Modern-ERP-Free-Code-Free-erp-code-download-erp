<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Utility_companybranch'); ?></h5>
<?php
echo $this->session->flashdata('msg');
?>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/utility_companybranch/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type"
			class="select"
			onChange="window.location='<?php echo site_url('admin/utility_companybranch/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/utility_companybranch/search/',array("class"=>"form-horizontal")); ?>
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

<!--Data display of utility_companybranch-->
<table class="table table-striped table-bordered">
	<tr>
		<th>Name</th>
		<th>Description</th>
		<th>Email</th>
		<th>Cell Phone</th>
		<th>Land Phone</th>
		<th>Country</th>
		<th>State</th>
		<th>City</th>
		<th>Zip Code</th>
		<th>About</th>
		<th>Contact Details</th>
		<th>Latitude</th>
		<th>Longitude</th>
		<th>Year Established</th>
		<th>Total Employees</th>
		<th>Business Type</th>
		<th>Main Products</th>
		<th>Total Annual Revenue</th>
		<th>Url</th>
		<th>Social Link</th>
		<th>Utility Company</th>

		<th>Actions</th>
	</tr>
	<?php foreach($utility_companybranch as $c){ ?>
    <tr>
		<td><?php echo $c['name']; ?></td>
		<td><?php echo $c['description']; ?></td>
		<td><?php echo $c['email']; ?></td>
		<td><?php echo $c['cell_phone']; ?></td>
		<td><?php echo $c['land_phone']; ?></td>
		<td><?php echo $c['country']; ?></td>
		<td><?php echo $c['state']; ?></td>
		<td><?php echo $c['city']; ?></td>
		<td><?php echo $c['zip_code']; ?></td>
		<td><?php echo $c['about']; ?></td>
		<td><?php echo $c['contact_details']; ?></td>
		<td><?php echo $c['latitude']; ?></td>
		<td><?php echo $c['longitude']; ?></td>
		<td><?php echo $c['year_established']; ?></td>
		<td><?php echo $c['total_employees']; ?></td>
		<td><?php echo $c['business_type']; ?></td>
		<td><?php echo $c['main_products']; ?></td>
		<td><?php echo $c['total_annual_revenue']; ?></td>
		<td><?php echo $c['url']; ?></td>
		<td><?php echo $c['social_link']; ?></td>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Utility_company_model');
    $dataArr = $this->CI->Utility_company_model->get_utility_company($c['utility_company_id']);
    echo $dataArr['name'];
    ?>
									</td>

		<td><a
			href="<?php echo site_url('admin/utility_companybranch/details/'.$c['id']); ?>"
			class="action-icon"> <i class="zmdi zmdi-eye"></i></a> <a
			href="<?php echo site_url('admin/utility_companybranch/save/'.$c['id']); ?>"
			class="action-icon"> <i class="zmdi zmdi-edit"></i></a> <a
			href="<?php echo site_url('admin/utility_companybranch/remove/'.$c['id']); ?>"
			onClick="return confirm('Are you sure to delete this item?');"
			class="action-icon"> <i class="zmdi zmdi-delete"></i></a></td>
	</tr>
	<?php } ?>
</table>
<!--End of Data display of utility_companybranch//-->

<!--No data-->
<?php
if (count($utility_companybranch) == 0) {
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
