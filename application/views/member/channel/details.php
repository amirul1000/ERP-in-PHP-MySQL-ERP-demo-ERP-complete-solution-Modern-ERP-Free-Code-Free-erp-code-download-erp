<a href="<?php echo site_url('member/channel/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Channel'); ?></h5>
<!--Data display of channel with id-->
<?php
$c = $channel;
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
		<td>Channel Name</td>
		<td><?php echo $c['channel_name']; ?></td>
	</tr>

	<tr>
		<td>File Bannar</td>
		<td><?php
if (is_file(APPPATH . '../public/' . $c['file_bannar']) && file_exists(APPPATH . '../public/' . $c['file_bannar'])) {
    ?>
										  <img
			src="<?php echo base_url().'public/'.$c['file_bannar']?>"
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
		<td>About</td>
		<td><?php echo $c['about']; ?></td>
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
<!--End of Data display of channel with id//-->
