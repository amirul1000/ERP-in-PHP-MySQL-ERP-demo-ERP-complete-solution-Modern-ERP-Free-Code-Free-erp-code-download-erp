<a  href="<?php echo site_url('admin/account_emailaddress/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Account_emailaddress'); ?></h5>
<!--Data display of account_emailaddress with id--> 
<?php
	$c = $account_emailaddress;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Email</td><td><?php echo $c['email']; ?></td></tr>

<tr><td>Verified</td><td><?php echo $c['verified']; ?></td></tr>

<tr><td>Primary</td><td><?php echo $c['primary']; ?></td></tr>

<tr><td>Users</td><td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Users_model');
									   $dataArr = $this->CI->Users_model->get_users($c['users_id']);
									   echo $dataArr['email'];?>
									</td></tr>


</table>
<!--End of Data display of account_emailaddress with id//--> 