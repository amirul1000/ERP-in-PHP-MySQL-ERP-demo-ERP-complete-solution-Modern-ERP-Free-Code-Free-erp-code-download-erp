<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css">
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Hr_employee'); ?></h3>
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
<!--Data display of hr_employee-->
<table cellspacing="3" cellpadding="3" class="table" align="center">
	<tr>
		<th>Users</th>
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
		<th>Fathers Name</th>
		<th>Mothers Name</th>
		<th>Home District</th>
		<th>Spouse Occupation</th>
		<th>Spouse District</th>
		<th>Religion</th>
		<th>Date Joining</th>
		<th>Entry Designation</th>
		<th>Entry Scale</th>
		<th>Picture</th>
		<th>Archive Status</th>
		<th>Status</th>

	</tr>
	<?php foreach($hr_employee as $c){ ?>
    <tr>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Users_model');
    $dataArr = $this->CI->Users_model->get_users($c['users_id']);
    echo $dataArr['email'];
    ?>
									</td>
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
		<td><?php echo $c['fathers_name']; ?></td>
		<td><?php echo $c['mothers_name']; ?></td>
		<td><?php echo $c['home_district']; ?></td>
		<td><?php echo $c['spouse_occupation']; ?></td>
		<td><?php echo $c['spouse_district']; ?></td>
		<td><?php echo $c['religion']; ?></td>
		<td><?php echo $c['date_joining']; ?></td>
		<td><?php echo $c['entry_designation']; ?></td>
		<td><?php echo $c['entry_scale']; ?></td>
		<td><?php echo $c['picture']; ?></td>
		<td><?php echo $c['archive_status']; ?></td>
		<td><?php echo $c['status']; ?></td>

	</tr>
	<?php } ?>
</table>
<!--End of Data display of hr_employee//-->
