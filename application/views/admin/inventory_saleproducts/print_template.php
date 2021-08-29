<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css">
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Inventory_saleproducts'); ?></h3>
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
<!--Data display of inventory_saleproducts-->
<table cellspacing="3" cellpadding="3" class="table" align="center">
	<tr>
		<th>Quantity</th>
		<th>Discount</th>
		<th>Tax</th>
		<th>Date Added</th>
		<th>Slug</th>
		<th>Inventory Item</th>
		<th>Inventory Sale</th>
		<th>Utility Unit</th>

	</tr>
	<?php foreach($inventory_saleproducts as $c){ ?>
    <tr>
		<td><?php echo $c['quantity']; ?></td>
		<td><?php echo $c['discount']; ?></td>
		<td><?php echo $c['tax']; ?></td>
		<td><?php echo $c['date_added']; ?></td>
		<td><?php echo $c['slug']; ?></td>
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
    $this->CI->load->model('Inventory_sale_model');
    $dataArr = $this->CI->Inventory_sale_model->get_inventory_sale($c['inventory_sale_id']);
    echo $dataArr['created_on'];
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

	</tr>
	<?php } ?>
</table>
<!--End of Data display of inventory_saleproducts//-->
