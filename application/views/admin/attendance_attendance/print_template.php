<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css">
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Attendance_attendance'); ?></h3>
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
<!--Data display of attendance_attendance-->
<table cellspacing="3" cellpadding="3" class="table" align="center">
	<tr>
		<th>Enterance Date</th>
		<th>Enterance Time</th>
		<th>Deperature Date</th>
		<th>Deperature Time</th>
		<th>Entry Card Status</th>
		<th>Comments</th>
		<th>Hr Employee</th>

	</tr>
	<?php foreach($attendance_attendance as $c){ ?>
    <tr>
		<td><?php echo $c['enterance_date']; ?></td>
		<td><?php echo $c['enterance_time']; ?></td>
		<td><?php echo $c['deperature_date']; ?></td>
		<td><?php echo $c['deperature_time']; ?></td>
		<td><?php echo $c['entry_card_status']; ?></td>
		<td><?php echo $c['comments']; ?></td>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Hr_employee_model');
    $dataArr = $this->CI->Hr_employee_model->get_hr_employee($c['hr_employee_id']);
    echo $dataArr['first_name'];
    ?>
									</td>

	</tr>
	<?php } ?>
</table>
<!--End of Data display of attendance_attendance//-->
