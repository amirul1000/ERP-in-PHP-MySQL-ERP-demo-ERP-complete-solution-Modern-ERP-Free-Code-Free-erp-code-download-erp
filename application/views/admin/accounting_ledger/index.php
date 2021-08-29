<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Accounting_ledger'); ?></h5>
<?php
  	echo $this->session->flashdata('msg');
?>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/accounting_ledger/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type" class="select"
			onChange="window.location='<?php echo site_url('admin/accounting_ledger/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/accounting_ledger/search/',array("class"=>"form-horizontal")); ?>
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
   
<!--Data display of accounting_ledger-->       
<table class="table table-striped table-bordered">
    <tr>
		<th>Accounting Accounttype</th>
<th>Code</th>
<th>Name</th>
<th>Description</th>
<th>Total Debit</th>
<th>Total Credit</th>
<th>Balance</th>
<th>Last Update Date</th>

		<th>Actions</th>
    </tr>
	<?php foreach($accounting_ledger as $c){ ?>
    <tr>
		<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Accounting_accounttype_model');
									   $dataArr = $this->CI->Accounting_accounttype_model->get_accounting_accounttype($c['accounting_accounttype_id']);
									   echo $dataArr['name'];?>
									</td>
<td><?php echo $c['code']; ?></td>
<td><?php echo $c['name']; ?></td>
<td><?php echo $c['description']; ?></td>
<td><?php echo $c['total_debit']; ?></td>
<td><?php echo $c['total_credit']; ?></td>
<td><?php echo $c['balance']; ?></td>
<td><?php echo $c['last_update_date']; ?></td>

		<td>
            <a href="<?php echo site_url('admin/accounting_ledger/details/'.$c['id']); ?>"  class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
            <a href="<?php echo site_url('admin/accounting_ledger/save/'.$c['id']); ?>" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
            <a href="<?php echo site_url('admin/accounting_ledger/remove/'.$c['id']); ?>" onClick="return confirm('Are you sure to delete this item?');" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
<!--End of Data display of accounting_ledger//--> 

<!--No data-->
<?php
	if(count($accounting_ledger)==0){
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
