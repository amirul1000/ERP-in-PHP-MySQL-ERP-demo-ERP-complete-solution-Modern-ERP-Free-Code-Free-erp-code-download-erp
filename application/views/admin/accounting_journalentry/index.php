<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Accounting_journalentry'); ?></h5>
<?php
  	echo $this->session->flashdata('msg');
?>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/accounting_journalentry/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type" class="select"
			onChange="window.location='<?php echo site_url('admin/accounting_journalentry/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/accounting_journalentry/search/',array("class"=>"form-horizontal")); ?>
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
   
<!--Data display of accounting_journalentry-->       
<table class="table table-striped table-bordered">
    <tr>
		<th>Users</th>
<th>Accounting Accounttype</th>
<th>Accounting Accountyear</th>
<th>Ref No</th>
<th>Debit</th>
<th>Credit</th>
<th>Currency</th>

		<th>Actions</th>
    </tr>
	<?php foreach($accounting_journalentry as $c){ ?>
    <tr>
		<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Users_model');
									   $dataArr = $this->CI->Users_model->get_users($c['users_id']);
									   echo $dataArr['email'];?>
									</td>
<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Accounting_accounttype_model');
									   $dataArr = $this->CI->Accounting_accounttype_model->get_accounting_accounttype($c['accounting_accounttype_id']);
									   echo $dataArr['name'];?>
									</td>
<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Accounting_accountyear_model');
									   $dataArr = $this->CI->Accounting_accountyear_model->get_accounting_accountyear($c['accounting_accountyear_id']);
									   echo $dataArr['name'];?>
									</td>
<td><?php echo $c['ref_no']; ?></td>
<td><?php echo $c['debit']; ?></td>
<td><?php echo $c['credit']; ?></td>
<td><?php echo $c['currency']; ?></td>

		<td>
            <a href="<?php echo site_url('admin/accounting_journalentry/details/'.$c['id']); ?>"  class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
            <a href="<?php echo site_url('admin/accounting_journalentry/save/'.$c['id']); ?>" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
            <a href="<?php echo site_url('admin/accounting_journalentry/remove/'.$c['id']); ?>" onClick="return confirm('Are you sure to delete this item?');" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
<!--End of Data display of accounting_journalentry//--> 

<!--No data-->
<?php
	if(count($accounting_journalentry)==0){
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
