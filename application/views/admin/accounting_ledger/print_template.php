<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css"> 
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Accounting_ledger'); ?></h3>
Date: <?php echo date("Y-m-d");?>
<hr>
<!--*************************************************
*********mpdf header footer page no******************
****************************************************-->
<htmlpageheader name="firstpage" class="hide">
</htmlpageheader>

<htmlpageheader name="otherpages" class="hide">
    <span class="float_left"></span>
    <span  class="padding_5"> &nbsp; &nbsp; &nbsp;
     &nbsp; &nbsp; &nbsp;</span>
    <span class="float_right"></span>         
</htmlpageheader>      
<sethtmlpageheader name="firstpage" value="on" show-this-page="1" />
<sethtmlpageheader name="otherpages" value="on" /> 
   
<htmlpagefooter name="myfooter"  class="hide">                          
     <div align="center">
               <br><span class="padding_10">Page {PAGENO} of {nbpg}</span> 
     </div>
</htmlpagefooter>    

<sethtmlpagefooter name="myfooter" value="on" />
<!--*************************************************
*********#////mpdf header footer page no******************
****************************************************-->
<!--Data display of accounting_ledger-->    
<table   cellspacing="3" cellpadding="3" class="table" align="center">
    <tr>
		<th>Accounting Accounttype</th>
<th>Code</th>
<th>Name</th>
<th>Description</th>
<th>Total Debit</th>
<th>Total Credit</th>
<th>Balance</th>
<th>Last Update Date</th>

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

    </tr>
	<?php } ?>
</table>
<!--End of Data display of accounting_ledger//--> 