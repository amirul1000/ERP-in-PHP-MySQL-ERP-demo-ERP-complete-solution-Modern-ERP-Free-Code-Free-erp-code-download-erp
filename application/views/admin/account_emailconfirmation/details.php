<a  href="<?php echo site_url('admin/account_emailconfirmation/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Account_emailconfirmation'); ?></h5>
<!--Data display of account_emailconfirmation with id--> 
<?php
	$c = $account_emailconfirmation;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Created</td><td><?php echo $c['created']; ?></td></tr>

<tr><td>Sent</td><td><?php echo $c['sent']; ?></td></tr>

<tr><td>Key</td><td><?php echo $c['key']; ?></td></tr>

<tr><td>Account Emailaddress</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Account_emailaddress_model');
									   $dataArr = $this->CI->Account_emailaddress_model->get_account_emailaddress($c['account_emailaddress_id']);
									   echo $dataArr['email'];?>
									</td></tr>


</table>
<!--End of Data display of account_emailconfirmation with id//--> 