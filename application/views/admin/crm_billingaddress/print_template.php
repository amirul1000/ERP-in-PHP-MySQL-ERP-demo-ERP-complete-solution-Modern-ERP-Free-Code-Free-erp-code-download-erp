<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css">
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Crm_billingaddress'); ?></h3>
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
<!--Data display of crm_billingaddress-->
<table cellspacing="3" cellpadding="3" class="table" align="center">
	<tr>
		<th>Address1</th>
		<th>Address2</th>
		<th>Country</th>
		<th>State</th>
		<th>City</th>
		<th>Zip Code</th>

	</tr>
	<?php foreach($crm_billingaddress as $c){ ?>
    <tr>
		<td><?php echo $c['address1']; ?></td>
		<td><?php echo $c['address2']; ?></td>
		<td><?php echo $c['country']; ?></td>
		<td><?php echo $c['state']; ?></td>
		<td><?php echo $c['city']; ?></td>
		<td><?php echo $c['zip_code']; ?></td>

	</tr>
	<?php } ?>
</table>
<!--End of Data display of crm_billingaddress//-->
