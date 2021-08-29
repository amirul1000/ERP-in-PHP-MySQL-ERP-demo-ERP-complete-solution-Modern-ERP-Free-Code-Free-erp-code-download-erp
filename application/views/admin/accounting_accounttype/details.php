<a  href="<?php echo site_url('admin/accounting_accounttype/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Accounting_accounttype'); ?></h5>
<!--Data display of accounting_accounttype with id--> 
<?php
	$c = $accounting_accounttype;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Parent Accounting Accounttype</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Accounting_accounttype_model');
									   $dataArr = $this->CI->Accounting_accounttype_model->get_accounting_accounttype($c['parent_accounting_accounttype_id']);
									   echo $dataArr['name'];?>
									</td></tr>

<tr><td>Name</td><td><?php echo $c['name']; ?></td></tr>

<tr><td>Slug</td><td><?php echo $c['slug']; ?></td></tr>


</table>
<!--End of Data display of accounting_accounttype with id//--> 