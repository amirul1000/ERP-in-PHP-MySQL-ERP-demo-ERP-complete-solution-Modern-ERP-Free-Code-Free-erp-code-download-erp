<a  href="<?php echo site_url('admin/accounting_transaction/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Accounting_transaction'); ?></h5>
<!--Data display of accounting_transaction with id--> 
<?php
	$c = $accounting_transaction;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Accounting Users</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Users_model');
									   $dataArr = $this->CI->Users_model->get_users($c['accounting_users_id']);
									   echo $dataArr['email'];?>
									</td></tr>

<tr><td>Accounting Accountyear</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Accounting_accountyear_model');
									   $dataArr = $this->CI->Accounting_accountyear_model->get_accounting_accountyear($c['accounting_accountyear_id']);
									   echo $dataArr['name'];?>
									</td></tr>

<tr><td>Subject</td><td><?php echo $c['subject']; ?></td></tr>

<tr><td>Ref No</td><td><?php echo $c['ref_no']; ?></td></tr>

<tr><td>Voucher No</td><td><?php echo $c['voucher_no']; ?></td></tr>

<tr><td>Post Status</td><td><?php echo $c['post_status']; ?></td></tr>

<tr><td>Trnsaction Type</td><td><?php echo $c['trnsaction_type']; ?></td></tr>

<tr><td>Created By Users</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Users_model');
									   $dataArr = $this->CI->Users_model->get_users($c['created_by_users_id']);
									   echo $dataArr['email'];?>
									</td></tr>

<tr><td>Modified By Users</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Users_model');
									   $dataArr = $this->CI->Users_model->get_users($c['modified_by_users_id']);
									   echo $dataArr['email'];?>
									</td></tr>

<tr><td>Created At</td><td><?php echo $c['created_at']; ?></td></tr>

<tr><td>Updated At</td><td><?php echo $c['updated_at']; ?></td></tr>


</table>
<!--End of Data display of accounting_transaction with id//--> 