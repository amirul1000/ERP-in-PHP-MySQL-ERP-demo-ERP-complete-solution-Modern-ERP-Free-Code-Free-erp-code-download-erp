<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css">
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Utility_company'); ?></h3>
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
<!--Data display of utility_company-->
<table cellspacing="3" cellpadding="3" class="table" align="center">
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

	</tr>
	<?php foreach($utility_company as $c){ ?>
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

	</tr>
	<?php } ?>
</table>
<!--End of Data display of utility_company//-->
