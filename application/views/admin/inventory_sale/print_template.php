<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css">
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Inventory_sale'); ?></h3>
Date: <?php echo date("Y-m-d");?>
<hr>
<!--*************************************************
*********mpdf header footer page no******************
****************************************************-->
<htmlpageheader name="firstpage" class="hide"> </htmlpageheader>

<htmlpageheader name="otherpages" class="hide"> <span class="float_left"></span>
<span class="padding_5"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>
<span class="float_right"></span> </htmlpageheader>
<sethtmlpageheader name="firstpage" value="on" show-this-page="1" />
<sethtmlpageheader name="otherpages" value="on" />

<htmlpagefooter name="myfooter" class="hide">
<div align="center">
	<br> <span class="padding_10">Page {PAGENO} of {nbpg}</span>
</div>
</htmlpagefooter>

<sethtmlpagefooter name="myfooter" value="on" />
<!--*************************************************
*********#////mpdf header footer page no******************
****************************************************-->
<!--Data display of inventory_sale-->
<table cellspacing="3" cellpadding="3" class="table" align="center">
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

	</tr>
	<?php } ?>
</table>
<!--End of Data display of inventory_sale//-->
