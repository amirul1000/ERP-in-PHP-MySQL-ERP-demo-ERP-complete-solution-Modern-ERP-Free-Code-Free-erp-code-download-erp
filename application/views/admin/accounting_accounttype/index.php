<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Accounting_accounttype'); ?></h5>
<?php
  	echo $this->session->flashdata('msg');
?>
<!--Action-->
<div>
	<div class="float_left padding_10">
		<a href="<?php echo site_url('admin/accounting_accounttype/save'); ?>"
			class="btn btn-success">Add</a>
	</div>
	<div class="float_left padding_10">
		<i class="fa fa-download"></i> Export <select name="xeport_type" class="select"
			onChange="window.location='<?php echo site_url('admin/accounting_accounttype/export'); ?>/'+this.value">
			<option>Select..</option>
			<option>Pdf</option>
			<option>CSV</option>
		</select>
	</div>
	<div  class="float_right padding_10">
		<ul class="left-side-navbar d-flex align-items-center">
			<li class="hide-phone app-search mr-15">
                <?php echo form_open_multipart('admin/accounting_accounttype/search/',array("class"=>"form-horizontal")); ?>
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
   
<!--Data display of accounting_accounttype-->       
<table class="table table-striped table-bordered">
    <tr>
		<th>Parent Accounting Accounttype</th>
<th>Name</th>
<th>Slug</th>

		<th>Actions</th>
    </tr>
	<?php foreach($accounting_accounttype as $c){ ?>
    <tr>
		<td><?php
									   $this->CI =& get_instance();
									   $this->CI->load->database();	
									   $this->CI->load->model('Accounting_accounttype_model');
									   $dataArr = $this->CI->Accounting_accounttype_model->get_accounting_accounttype($c['parent_accounting_accounttype_id']);
									   echo $dataArr['name'];?>
									</td>
<td><?php echo $c['name']; ?></td>
<td><?php echo $c['slug']; ?></td>

		<td>
            <a href="<?php echo site_url('admin/accounting_accounttype/details/'.$c['id']); ?>"  class="action-icon"> <i class="zmdi zmdi-eye"></i></a>
            <a href="<?php echo site_url('admin/accounting_accounttype/save/'.$c['id']); ?>" class="action-icon"> <i class="zmdi zmdi-edit"></i></a>
            <a href="<?php echo site_url('admin/accounting_accounttype/remove/'.$c['id']); ?>" onClick="return confirm('Are you sure to delete this item?');" class="action-icon"> <i class="zmdi zmdi-delete"></i></a>
        </td>
    </tr>
	<?php } ?>
</table>
<!--End of Data display of accounting_accounttype//--> 

<!--No data-->
<?php
	if(count($accounting_accounttype)==0){
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
