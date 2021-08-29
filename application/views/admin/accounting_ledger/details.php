<a  href="<?php echo site_url('admin/accounting_ledger/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Accounting_ledger'); ?></h5>
<!--Data display of accounting_ledger with id--> 
<?php
	$c = $accounting_ledger;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Accounting Accounttype</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Accounting_accounttype_model');
									   $dataArr = $this->CI->Accounting_accounttype_model->get_accounting_accounttype($c['accounting_accounttype_id']);
									   echo $dataArr['name'];?>
									</td></tr>

<tr><td>Code</td><td><?php echo $c['code']; ?></td></tr>

<tr><td>Name</td><td><?php echo $c['name']; ?></td></tr>

<tr><td>Description</td><td><?php echo $c['description']; ?></td></tr>

<tr><td>Total Debit</td><td><?php echo $c['total_debit']; ?></td></tr>

<tr><td>Total Credit</td><td><?php echo $c['total_credit']; ?></td></tr>

<tr><td>Balance</td><td><?php echo $c['balance']; ?></td></tr>

<tr><td>Last Update Date</td><td><?php echo $c['last_update_date']; ?></td></tr>


</table>
<!--End of Data display of accounting_ledger with id//--> 