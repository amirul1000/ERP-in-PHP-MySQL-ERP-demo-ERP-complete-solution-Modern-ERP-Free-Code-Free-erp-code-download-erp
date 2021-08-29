<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css">
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Inventory_item'); ?></h3>
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
<!--Data display of inventory_item-->
<table cellspacing="3" cellpadding="3" class="table" align="center">
	<tr>
		<th>Name</th>
		<th>Brand</th>
		<th>Model</th>
		<th>Item Quantity</th>
		<th>Date Added</th>
		<th>Slug</th>
		<th>Inventory Category</th>
		<th>Item Utility Unit</th>
		<th>Inventory Warehouse</th>
		<th>Orginal Price</th>
		<th>Sale Price</th>

	</tr>
	<?php foreach($inventory_item as $c){ ?>
    <tr>
		<td><?php echo $c['name']; ?></td>
		<td><?php echo $c['brand']; ?></td>
		<td><?php echo $c['model']; ?></td>
		<td><?php echo $c['item_quantity']; ?></td>
		<td><?php echo $c['date_added']; ?></td>
		<td><?php echo $c['slug']; ?></td>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Inventory_category_model');
    $dataArr = $this->CI->Inventory_category_model->get_inventory_category($c['inventory_category_id']);
    echo $dataArr['description'];
    ?>
									</td>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Utility_unit_model');
    $dataArr = $this->CI->Utility_unit_model->get_utility_unit($c['item_utility_unit_id']);
    echo $dataArr['name'];
    ?>
									</td>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Inventory_warehouse_model');
    $dataArr = $this->CI->Inventory_warehouse_model->get_inventory_warehouse($c['inventory_warehouse_id']);
    echo $dataArr['created_on'];
    ?>
									</td>
		<td><?php echo $c['orginal_price']; ?></td>
		<td><?php echo $c['sale_price']; ?></td>

	</tr>
	<?php } ?>
</table>
<!--End of Data display of inventory_item//-->
