<a href="<?php echo site_url('admin/video/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Video'); ?></h5>
<!--Data display of video with id-->
<?php
$c = $video;
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>Users</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Users_model');
$dataArr = $this->CI->Users_model->get_users($c['users_id']);
echo $dataArr['email'];
?>
									</td>
	</tr>

	<tr>
		<td>Channel</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Channel_model');
$dataArr = $this->CI->Channel_model->get_channel($c['channel_id']);
echo $dataArr['channel_name'];
?>
									</td>
	</tr>

	<tr>
		<td>Video Title</td>
		<td><?php echo $c['video_title']; ?></td>
	</tr>

	<tr>
		<td>Video Description</td>
		<td><?php echo $c['video_description']; ?></td>
	</tr>

	<tr>
		<td>Category</td>
		<td><?php echo $c['category']; ?></td>
	</tr>

	<tr>
		<td>File Poster</td>
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
	</tr>

	<tr>
		<td>File Thumbnail</td>
		<td><?php
if (is_file(APPPATH . '../public/' . $c['file_thumbnail']) && file_exists(APPPATH . '../public/' . $c['file_thumbnail'])) {
    ?>
										  <img
			src="<?php echo base_url().'public/'.$c['file_thumbnail']?>"
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
	</tr>

	<tr>
		<td>File Video</td>
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
	</tr>

	<tr>
		<td>Content Type</td>
		<td><?php echo $c['content_type']; ?></td>
	</tr>

	<tr>
		<td>Video Url</td>
		<td><?php echo $c['video_url']; ?></td>
	</tr>

	<tr>
		<td>Display At</td>
		<td><?php echo $c['display_at']; ?></td>
	</tr>

	<tr>
		<td>Display Order No</td>
		<td><?php echo $c['display_order_no']; ?></td>
	</tr>

	<tr>
		<td>Pub Status</td>
		<td><?php echo $c['pub_status']; ?></td>
	</tr>

	<tr>
		<td>Created At</td>
		<td><?php echo $c['created_at']; ?></td>
	</tr>

	<tr>
		<td>Updated At</td>
		<td><?php echo $c['updated_at']; ?></td>
	</tr>


</table>
<!--End of Data display of video with id//-->
