<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css">
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Attendance_in_out_track'); ?></h3>
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
<!--Data display of attendance_in_out_track-->
<table cellspacing="3" cellpadding="3" class="table" align="center">
	<tr>
		<th>Time Occure</th>
		<th>In Out</th>
		<th>Entry Card Status</th>
		<th>Comments</th>
		<th>Attendance Attendance</th>

	</tr>
	<?php foreach($attendance_in_out_track as $c){ ?>
    <tr>
		<td><?php echo $c['time_occure']; ?></td>
		<td><?php echo $c['in_out']; ?></td>
		<td><?php echo $c['entry_card_status']; ?></td>
		<td><?php echo $c['comments']; ?></td>
		<td><?php
    $this->CI = & get_instance();
    $this->CI->load->database();
    $this->CI->load->model('Attendance_attendance_model');
    $dataArr = $this->CI->Attendance_attendance_model->get_attendance_attendance($c['attendance_attendance_id']);
    echo $dataArr['enterance_date'];
    ?>
									</td>

	</tr>
	<?php } ?>
</table>
<!--End of Data display of attendance_in_out_track//-->
