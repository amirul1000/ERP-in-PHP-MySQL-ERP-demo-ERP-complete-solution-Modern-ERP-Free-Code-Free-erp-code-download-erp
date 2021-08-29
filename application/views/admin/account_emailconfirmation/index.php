<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Account_emailconfirmation'); ?></h5>
<?php
  	echo $this->session->flashdata('msg');
?>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/account_emailconfirmation/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type" class="select"
			onChange="window.location='<?php echo site_url('admin/account_emailconfirmation/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/account_emailconfirmation/search/',array("class"=>"form-horizontal")); ?>
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
   
<!--Data display of account_emailconfirmation-->       
<table class="table table-striped table-bordered">
    <tr>
		<th>Created</th>
<th>Sent</th>
<th>Key</th>
<th>Account Emailaddress</th>

		<th>Actions</th>
    </tr>
	<?php foreach($account_emailconfirmation as $c){ ?>
    <tr>
		<td><?php echo $c['created']; ?></td>
<td><?php echo $c['sent']; ?></td>
<td><?php echo $c['key']; ?></td>
<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Account_emailaddress_model');
									   $dataArr = $this->CI->Account_emailaddress_model->get_account_emailaddress($c['account_emailaddress_id']);
									   echo $dataArr['email'];?>
									</td>

		<td>
            <a href="<?php echo site_url('admin/account_emailconfirmation/details/'.$c['id']); ?>"  class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
            <a href="<?php echo site_url('admin/account_emailconfirmation/save/'.$c['id']); ?>" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
            <a href="<?php echo site_url('admin/account_emailconfirmation/remove/'.$c['id']); ?>" onClick="return confirm('Are you sure to delete this item?');" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
<!--End of Data display of account_emailconfirmation//--> 

<!--No data-->
<?php
	if(count($account_emailconfirmation)==0){
?>
 <div align="center"><h3>Data is not exists</h3></div>
<?php
	}
?>
<!--End of No data//-->

<!--Pagination-->
<?php
	echo $link;
?>
<!--End of Pagination//-->
