<a  href="<?php echo site_url('admin/accounting_journalentry/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Accounting_journalentry'); ?></h5>
<!--Data display of accounting_journalentry with id--> 
<?php
	$c = $accounting_journalentry;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Users</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Users_model');
									   $dataArr = $this->CI->Users_model->get_users($c['users_id']);
									   echo $dataArr['email'];?>
									</td></tr>

<tr><td>Accounting Accounttype</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Accounting_accounttype_model');
									   $dataArr = $this->CI->Accounting_accounttype_model->get_accounting_accounttype($c['accounting_accounttype_id']);
									   echo $dataArr['name'];?>
									</td></tr>

<tr><td>Accounting Accountyear</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Accounting_accountyear_model');
									   $dataArr = $this->CI->Accounting_accountyear_model->get_accounting_accountyear($c['accounting_accountyear_id']);
									   echo $dataArr['name'];?>
									</td></tr>

<tr><td>Ref No</td><td><?php echo $c['ref_no']; ?></td></tr>

<tr><td>Debit</td><td><?php echo $c['debit']; ?></td></tr>

<tr><td>Credit</td><td><?php echo $c['credit']; ?></td></tr>

<tr><td>Currency</td><td><?php echo $c['currency']; ?></td></tr>

<tr><td>Created At</td><td><?php echo $c['created_at']; ?></td></tr>

<tr><td>Updated At</td><td><?php echo $c['updated_at']; ?></td></tr>


</table>
<!--End of Data display of accounting_journalentry with id//--> 