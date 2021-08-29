<link rel="stylesheet"
	href="<?php echo base_url(); ?>public/css/custom.css"> 
<h3 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Accounting_transactiondetails'); ?></h3>
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
<!--Data display of accounting_transactiondetails-->    
<table   cellspacing="3" cellpadding="3" class="table" align="center">
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

    </tr>
	<?php } ?>
</table>
<!--End of Data display of accounting_transactiondetails//--> 