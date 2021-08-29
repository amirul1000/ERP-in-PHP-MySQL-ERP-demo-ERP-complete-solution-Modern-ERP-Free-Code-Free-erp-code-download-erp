<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css">
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Inventory_warehousemanager'); ?></h3>
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
<!--Data display of inventory_warehousemanager-->
<table cellspacing="3" cellpadding="3" class="table" align="center">
	<tr>
		<th>Appointed Date</th>
		<th>Date End</th>
		<th>Status</th>
		<th>Manager Hr Employee</th>
		<th>Inventory Warehouse</th>

	</tr>
	<?php foreach($inventory_warehousemanager as $c){ ?>
    <tr>
		<td><?php echo $c['appointed_date']; ?></td>
		<td><?php echo $c['date_end']; ?></td>
		<td><?php echo $c['status']; ?></td>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Hr_employee_model');
    $dataArr = $this->CI->Hr_employee_model->get_hr_employee($c['manager_hr_employee_id']);
    echo $dataArr['first_name'];
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

	</tr>
	<?php } ?>
</table>
<!--End of Data display of inventory_warehousemanager//-->
