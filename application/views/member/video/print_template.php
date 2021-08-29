<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css">
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Video'); ?></h3>
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
<!--Data display of video-->
<table cellspacing="3" cellpadding="3" class="table" align="center">
	<tr>
		<th>Video Title</th>
		<th>Video Description</th>
		<th>File Banner</th>
		<th>File Video</th>
		<th>Video Url</th>
		<th>Display At</th>
		<th>Display Order No</th>

	</tr>
	<?php foreach($video as $c){ ?>
    <tr>
		<td><?php echo $c['video_title']; ?></td>
		<td><?php echo $c['video_description']; ?></td>
		<td><?php
    if (is_file(APPPATH . '../public/' . $c['file_poster']) && file_exists(APPPATH . '../public/' . $c['file_poster'])) {
        ?>
										  <img
			src="<?php echo base_url().'public/'.$c['file_poster']?>"
			class="picture_50x50">
										  <?php
    } else {
        ?>
										<img src="<?php echo base_url()?>public/uploads/no_image.jpg"
			class="picture_50x50">
										<?php
    }
    ?>	
										</td>
		<td><?php
    if (is_file(APPPATH . '../public/' . $c['file_video']) && file_exists(APPPATH . '../public/' . $c['file_video'])) {
        ?>
										  <img
			src="<?php echo base_url().'public/'.$c['file_video']?>"
			class="picture_50x50">
										  <?php
    } else {
        ?>
										<img src="<?php echo base_url()?>public/uploads/no_image.jpg"
			class="picture_50x50">
										<?php
    }
    ?>	
										</td>
		<td><?php echo $c['video_url']; ?></td>
		<td><?php echo $c['display_at']; ?></td>
		<td><?php echo $c['display_order_no']; ?></td>

	</tr>
	<?php } ?>
</table>
<!--End of Data display of video//-->
