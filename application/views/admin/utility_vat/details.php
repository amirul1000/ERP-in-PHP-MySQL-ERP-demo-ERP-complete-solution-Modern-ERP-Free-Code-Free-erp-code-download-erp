<a href="<?php echo site_url('admin/utility_vat/index'); ?>"
	class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Utility_vat'); ?></h5>
<!--Data display of utility_vat with id-->
<?php
$c = $utility_vat;
?>
<table class="table table-striped table-bordered">
	<tr>
		<td>Vat</td>
		<td><?php echo $c['vat']; ?></td>
	</tr>

	<tr>
		<td>Utility Businesstype</td>
		<td><?php
$this->CI = & get_instance();
$this->CI->load->database();
$this->CI->load->model('Utility_businesstype_model');
$dataArr = $this->CI->Utility_businesstype_model->get_utility_businesstype($c['utility_businesstype_id']);
echo $dataArr['name'];
?>
									</td>
	</tr>


</table>
<!--End of Data display of utility_vat with id//-->
