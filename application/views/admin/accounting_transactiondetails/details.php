<a  href="<?php echo site_url('admin/accounting_transactiondetails/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Accounting_transactiondetails'); ?></h5>
<!--Data display of accounting_transactiondetails with id--> 
<?php
	$c = $accounting_transactiondetails;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Accounting Transaction</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Accounting_transaction_model');
									   $dataArr = $this->CI->Accounting_transaction_model->get_accounting_transaction($c['accounting_transaction_id']);
									   echo $dataArr['subject'];?>
									</td></tr>

<tr><td>Accounting Ledger</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Accounting_ledger_model');
									   $dataArr = $this->CI->Accounting_ledger_model->get_accounting_ledger($c['accounting_ledger_id']);
									   echo $dataArr['code'];?>
									</td></tr>

<tr><td>Users</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Users_model');
									   $dataArr = $this->CI->Users_model->get_users($c['users_id']);
									   echo $dataArr['email'];?>
									</td></tr>

<tr><td>Description</td><td><?php echo $c['description']; ?></td></tr>

<tr><td>Vat</td><td><?php echo $c['vat']; ?></td></tr>

<tr><td>Tax</td><td><?php echo $c['tax']; ?></td></tr>

<tr><td>Debit</td><td><?php echo $c['debit']; ?></td></tr>

<tr><td>Credit</td><td><?php echo $c['credit']; ?></td></tr>

<tr><td>Currency</td><td><?php echo $c['currency']; ?></td></tr>


</table>
<!--End of Data display of accounting_transactiondetails with id//--> 