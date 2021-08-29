<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Attendance_in_out_track'); ?></h5>
<?php
echo $this->session->flashdata('msg');
?>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a
			href="<?php echo site_url('admin/attendance_in_out_track/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type"
			class="select"
			onChange="window.location='<?php echo site_url('admin/attendance_in_out_track/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/attendance_in_out_track/search/',array("class"=>"form-horizontal")); ?>
                    <input name="key" type="text"
				value="<?php echo isset($key)?$key:'';?>" placeholder="Search..."
				class="form-control">
				<button type="submit" class="mr-0">
					<i class="fa fa-search"></i>
				</button>
                <?php echo form_close(); ?>
            </li>
		</ul>
	</div>
</div>
<!--End of Action//-->

<!--Data display of attendance_in_out_track-->
<table class="table table-striped table-bordered">
	<tr>
		<th>Time Occure</th>
		<th>In Out</th>
		<th>Entry Card Status</th>
		<th>Comments</th>
		<th>Attendance Attendance</th>

		<th>Actions</th>
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

		<td><a
			href="<?php echo site_url('admin/attendance_in_out_track/details/'.$c['id']); ?>"
			class="action-icon"> <i class="zmdi zmdi-eye"></i></a> <a
			href="<?php echo site_url('admin/attendance_in_out_track/save/'.$c['id']); ?>"
			class="action-icon"> <i class="zmdi zmdi-edit"></i></a> <a
			href="<?php echo site_url('admin/attendance_in_out_track/remove/'.$c['id']); ?>"
			onClick="return confirm('Are you sure to delete this item?');"
			class="action-icon"> <i class="zmdi zmdi-delete"></i></a></td>
	</tr>
	<?php } ?>
</table>
<!--End of Data display of attendance_in_out_track//-->

<!--No data-->
<?php
if (count($attendance_in_out_track) == 0) {
    ?>
<div align="center">
	<h3>Data is not exists</h3>
</div>
<?php
}
?>
<!--End of No data//-->

<!--Pagination-->
<?php
echo $link;
?>
<!--End of Pagination//-->
