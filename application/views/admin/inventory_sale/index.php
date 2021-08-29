<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Inventory_sale'); ?></h5>
<?php
echo $this->session->flashdata('msg');
?>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/inventory_sale/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type"
			class="select"
			onChange="window.location='<?php echo site_url('admin/inventory_sale/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/inventory_sale/search/',array("class"=>"form-horizontal")); ?>
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

<!--Data display of inventory_sale-->
<table class="table table-striped table-bordered">
	<tr>
		<th>Created On</th>
		<th>Modified On</th>
		<th>Status</th>
		<th>Crm Billingaddress</th>
		<th>Created By Users</th>
		<th>Crm Customer</th>
		<th>Modified By Users</th>
		<th>Crm Supplier</th>
		<th>Crm Shippingaddress</th>

		<th>Actions</th>
	</tr>
	<?php foreach($inventory_sale as $c){ ?>
    <tr>
		<td><?php echo $c['created_on']; ?></td>
		<td><?php echo $c['modified_on']; ?></td>
		<td><?php echo $c['status']; ?></td>
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
    $this->CI->load->model('Users_model');
    $dataArr = $this->CI->Users_model->get_users($c['created_by_users_id']);
    echo $dataArr['email'];
    ?>
									</td>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Crm_customer_model');
    $dataArr = $this->CI->Crm_customer_model->get_crm_customer($c['crm_customer_id']);
    echo $dataArr['first_name'];
    ?>
									</td>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Users_model');
    $dataArr = $this->CI->Users_model->get_users($c['modified_by_users_id']);
    echo $dataArr['email'];
    ?>
									</td>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Crm_supplier_model');
    $dataArr = $this->CI->Crm_supplier_model->get_crm_supplier($c['crm_supplier_id']);
    echo $dataArr['first_name'];
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
			href="<?php echo site_url('admin/inventory_sale/details/'.$c['id']); ?>"
			class="action-icon"> <i class="zmdi zmdi-eye"></i></a> <a
			href="<?php echo site_url('admin/inventory_sale/save/'.$c['id']); ?>"
			class="action-icon"> <i class="zmdi zmdi-edit"></i></a> <a
			href="<?php echo site_url('admin/inventory_sale/remove/'.$c['id']); ?>"
			onClick="return confirm('Are you sure to delete this item?');"
			class="action-icon"> <i class="zmdi zmdi-delete"></i></a></td>
	</tr>
	<?php } ?>
</table>
<!--End of Data display of inventory_sale//-->

<!--No data-->
<?php
if (count($inventory_sale) == 0) {
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
