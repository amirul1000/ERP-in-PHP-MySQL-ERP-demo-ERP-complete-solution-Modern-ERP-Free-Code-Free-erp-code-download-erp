<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Crm_customer'); ?></h5>
<?php
echo $this->session->flashdata('msg');
?>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/crm_customer/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type"
			class="select"
			onChange="window.location='<?php echo site_url('admin/crm_customer/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/crm_customer/search/',array("class"=>"form-horizontal")); ?>
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

<!--Data display of crm_customer-->
<table class="table table-striped table-bordered">
	<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Gender</th>
		<th>Date Of Birth</th>
		<th>Nationa</th>
		<th>Blood Group</th>
		<th>Marital Status</th>
		<th>Name Spouse</th>
		<th>Email</th>
		<th>Cell Phone</th>
		<th>Land Phone</th>
		<th>Country</th>
		<th>State</th>
		<th>City</th>
		<th>Zip Code</th>
		<th>Permanent Address</th>
		<th>About</th>
		<th>Contact Details</th>
		<th>Latitude</th>
		<th>Longitude</th>
		<th>Date Joining</th>
		<th>Picture</th>
		<th>Archive Status</th>
		<th>Status</th>
		<th>Users</th>
		<th>Crm Billingaddress</th>
		<th>Crm Shippingaddress</th>

		<th>Actions</th>
	</tr>
	<?php foreach($crm_customer as $c){ ?>
    <tr>
		<td><?php echo $c['first_name']; ?></td>
		<td><?php echo $c['last_name']; ?></td>
		<td><?php echo $c['gender']; ?></td>
		<td><?php echo $c['date_of_birth']; ?></td>
		<td><?php echo $c['nationalid']; ?></td>
		<td><?php echo $c['blood_group']; ?></td>
		<td><?php echo $c['marital_status']; ?></td>
		<td><?php echo $c['name_spouse']; ?></td>
		<td><?php echo $c['email']; ?></td>
		<td><?php echo $c['cell_phone']; ?></td>
		<td><?php echo $c['land_phone']; ?></td>
		<td><?php echo $c['country']; ?></td>
		<td><?php echo $c['state']; ?></td>
		<td><?php echo $c['city']; ?></td>
		<td><?php echo $c['zip_code']; ?></td>
		<td><?php echo $c['permanent_address']; ?></td>
		<td><?php echo $c['about']; ?></td>
		<td><?php echo $c['contact_details']; ?></td>
		<td><?php echo $c['latitude']; ?></td>
		<td><?php echo $c['longitude']; ?></td>
		<td><?php echo $c['date_joining']; ?></td>
		<td><?php echo $c['picture']; ?></td>
		<td><?php echo $c['archive_status']; ?></td>
		<td><?php echo $c['status']; ?></td>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Users_model');
    $dataArr = $this->CI->Users_model->get_users($c['users_id']);
    echo $dataArr['email'];
    ?>
									</td>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Crm_billingaddress_model');
    $dataArr = $this->CI->Crm_billingaddress_model->get_crm_billingaddress($c['crm_billingaddress_id']);
    echo $dataArr['address1'];
    ?>
									</td>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Crm_shippingaddress_model');
    $dataArr = $this->CI->Crm_shippingaddress_model->get_crm_shippingaddress($c['crm_shippingaddress_id']);
    echo $dataArr['address1'];
    ?>
									</td>

		<td><a
			href="<?php echo site_url('admin/crm_customer/details/'.$c['id']); ?>"
			class="action-icon"> <i class="zmdi zmdi-eye"></i></a> <a
			href="<?php echo site_url('admin/crm_customer/save/'.$c['id']); ?>"
			class="action-icon"> <i class="zmdi zmdi-edit"></i></a> <a
			href="<?php echo site_url('admin/crm_customer/remove/'.$c['id']); ?>"
			onClick="return confirm('Are you sure to delete this item?');"
			class="action-icon"> <i class="zmdi zmdi-delete"></i></a></td>
	</tr>
	<?php } ?>
</table>
<!--End of Data display of crm_customer//-->

<!--No data-->
<?php
if (count($crm_customer) == 0) {
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
