<a href="<?php echo site_url('admin/inventory_buy/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Inventory_buy'); ?></h5>
<!--Data display of inventory_buy with id-->
<?php
$c = $inventory_buy;
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>Status</td>
		<td><?php echo $c['status']; ?></td>
	</tr>

	<tr>
		<td>Crm Billingaddress</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Crm_billingaddress_model');
$dataArr = $this->CI->Crm_billingaddress_model->get_crm_billingaddress($c['crm_billingaddress_id']);
echo $dataArr['address1'];
?>
									</td>
	</tr>

	<tr>
		<td>Crm Customer</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Crm_customer_model');
$dataArr = $this->CI->Crm_customer_model->get_crm_customer($c['crm_customer_id']);
echo $dataArr['first_name'];
?>
									</td>
	</tr>

	<tr>
		<td>Seller Users</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Users_model');
$dataArr = $this->CI->Users_model->get_users($c['seller_users_id']);
echo $dataArr['email'];
?>
									</td>
	</tr>

	<tr>
		<td>Crm Shippingaddress</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Crm_shippingaddress_model');
$dataArr = $this->CI->Crm_shippingaddress_model->get_crm_shippingaddress($c['crm_shippingaddress_id']);
echo $dataArr['address1'];
?>
									</td>
	</tr>


</table>
<!--End of Data display of inventory_buy with id//-->
