<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Accounting_transactiondetails'); ?></h5>
<?php
  	echo $this->session->flashdata('msg');
?>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/accounting_transactiondetails/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type" class="select"
			onChange="window.location='<?php echo site_url('admin/accounting_transactiondetails/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/accounting_transactiondetails/search/',array("class"=>"form-horizontal")); ?>
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
   
<!--Data display of accounting_transactiondetails-->       
<table class="table table-striped table-bordered">
    <tr>
		<th>Accounting Transaction</th>
<th>Accounting Ledger</th>
<th>Users</th>
<th>Description</th>
<th>Vat</th>
<th>Tax</th>
<th>Debit</th>
<th>Credit</th>
<th>Currency</th>

		<th>Actions</th>
    </tr>
	<?php foreach($accounting_transactiondetails as $c){ ?>
    <tr>
		<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Accounting_transaction_model');
									   $dataArr = $this->CI->Accounting_transaction_model->get_accounting_transaction($c['accounting_transaction_id']);
									   echo $dataArr['subject'];?>
									</td>
<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Accounting_ledger_model');
									   $dataArr = $this->CI->Accounting_ledger_model->get_accounting_ledger($c['accounting_ledger_id']);
									   echo $dataArr['code'];?>
									</td>
<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Users_model');
									   $dataArr = $this->CI->Users_model->get_users($c['users_id']);
									   echo $dataArr['email'];?>
									</td>
<td><?php echo $c['description']; ?></td>
<td><?php echo $c['vat']; ?></td>
<td><?php echo $c['tax']; ?></td>
<td><?php echo $c['debit']; ?></td>
<td><?php echo $c['credit']; ?></td>
<td><?php echo $c['currency']; ?></td>

		<td>
            <a href="<?php echo site_url('admin/accounting_transactiondetails/details/'.$c['id']); ?>"  class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
            <a href="<?php echo site_url('admin/accounting_transactiondetails/save/'.$c['id']); ?>" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
            <a href="<?php echo site_url('admin/accounting_transactiondetails/remove/'.$c['id']); ?>" onClick="return confirm('Are you sure to delete this item?');" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
<!--End of Data display of accounting_transactiondetails//--> 

<!--No data-->
<?php
	if(count($accounting_transactiondetails)==0){
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
