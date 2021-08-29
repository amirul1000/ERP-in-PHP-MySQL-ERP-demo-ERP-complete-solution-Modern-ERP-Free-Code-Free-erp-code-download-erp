<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Attendance_attendance'); ?></h5>
<?php
echo $this->session->flashdata('msg');
?>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/attendance_attendance/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type"
			class="select"
			onChange="window.location='<?php echo site_url('admin/attendance_attendance/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/attendance_attendance/search/',array("class"=>"form-horizontal")); ?>
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

<!--Data display of attendance_attendance-->
<table class="table table-striped table-bordered">
	<tr>
		<th>Enterance Date</th>
		<th>Enterance Time</th>
		<th>Deperature Date</th>
		<th>Deperature Time</th>
		<th>Entry Card Status</th>
		<th>Comments</th>
		<th>Hr Employee</th>

		<th>Actions</th>
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

		<td><a
			href="<?php echo site_url('admin/attendance_attendance/details/'.$c['id']); ?>"
			class="action-icon"> <i class="zmdi zmdi-eye"></i></a> <a
			href="<?php echo site_url('admin/attendance_attendance/save/'.$c['id']); ?>"
			class="action-icon"> <i class="zmdi zmdi-edit"></i></a> <a
			href="<?php echo site_url('admin/attendance_attendance/remove/'.$c['id']); ?>"
			onClick="return confirm('Are you sure to delete this item?');"
			class="action-icon"> <i class="zmdi zmdi-delete"></i></a></td>
	</tr>
	<?php } ?>
</table>
<!--End of Data display of attendance_attendance//-->

<!--No data-->
<?php
if (count($attendance_attendance) == 0) {
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
