<a  href="<?php echo site_url('admin/accounting_accountyear/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Accounting_accountyear'); ?></h5>
<!--Data display of accounting_accountyear with id--> 
<?php
	$c = $accounting_accountyear;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Name</td><td><?php echo $c['name']; ?></td></tr>

<tr><td>Start Date</td><td><?php echo $c['start_date']; ?></td></tr>

<tr><td>End Date</td><td><?php echo $c['end_date']; ?></td></tr>

<tr><td>Slug</td><td><?php echo $c['slug']; ?></td></tr>


</table>
<!--End of Data display of accounting_accountyear with id//--> 