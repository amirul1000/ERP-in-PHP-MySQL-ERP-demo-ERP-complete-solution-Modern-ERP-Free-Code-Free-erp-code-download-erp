<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css">
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Utility_predfinedpointsrule'); ?></h3>
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
<!--Data display of utility_predfinedpointsrule-->
<table cellspacing="3" cellpadding="3" class="table" align="center">
	<tr>
		<th>Created On</th>
		<th>Modified On</th>
		<th>Units Points</th>
		<th>Task Description</th>
		<th>Comments</th>
		<th>Created By Users</th>
		<th>Modified By Users</th>

	</tr>
	<?php foreach($utility_predfinedpointsrule as $c){ ?>
    <tr>
		<td><?php echo $c['created_on']; ?></td>
		<td><?php echo $c['modified_on']; ?></td>
		<td><?php echo $c['units_points']; ?></td>
		<td><?php echo $c['task_description']; ?></td>
		<td><?php echo $c['comments']; ?></td>
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
    $this->CI->load->model('Users_model');
    $dataArr = $this->CI->Users_model->get_users($c['modified_by_users_id']);
    echo $dataArr['email'];
    ?>
									</td>

	</tr>
	<?php } ?>
</table>
<!--End of Data display of utility_predfinedpointsrule//-->
