<a  href="<?php echo site_url('admin/accounting_transactiondetails/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Accounting_transactiondetails'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/accounting_transactiondetails/save/'.$accounting_transactiondetails['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
                                    <label for="Accounting Transaction" class="col-md-4 control-label">Accounting Transaction</label> 
         <div class="col-md-8"> 
          <?php 
             $this->CI =& get_instance(); 
             $this->CI->load->database();  
             $this->CI->load->model('Accounting_transaction_model'); 
             $dataArr = $this->CI->Accounting_transaction_model->get_all_accounting_transaction(); 
          ?> 
          <select name="accounting_transaction_id"  id="accounting_transaction_id"  class="form-control"/> 
            <option value="">--Select--</option> 
            <?php 
             for($i=0;$i<count($dataArr);$i++) 
             {  
            ?> 
            <option value="<?=$dataArr[$i]['id']?>" <?php if($accounting_transactiondetails['accounting_transaction_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['subject']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
                                    <label for="Accounting Ledger" class="col-md-4 control-label">Accounting Ledger</label> 
         <div class="col-md-8"> 
          <?php 
             $this->CI =& get_instance(); 
             $this->CI->load->database();  
             $this->CI->load->model('Accounting_ledger_model'); 
             $dataArr = $this->CI->Accounting_ledger_model->get_all_accounting_ledger(); 
          ?> 
          <select name="accounting_ledger_id"  id="accounting_ledger_id"  class="form-control"/> 
            <option value="">--Select--</option> 
            <?php 
             for($i=0;$i<count($dataArr);$i++) 
             {  
            ?> 
            <option value="<?=$dataArr[$i]['id']?>" <?php if($accounting_transactiondetails['accounting_ledger_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['code']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
                                    <label for="Users" class="col-md-4 control-label">Users</label> 
         <div class="col-md-8"> 
          <?php 
             $this->CI =& get_instance(); 
             $this->CI->load->database();  
             $this->CI->load->model('Users_model'); 
             $dataArr = $this->CI->Users_model->get_all_users(); 
          ?> 
          <select name="users_id"  id="users_id"  class="form-control"/> 
            <option value="">--Select--</option> 
            <?php 
             for($i=0;$i<count($dataArr);$i++) 
             {  
            ?> 
            <option value="<?=$dataArr[$i]['id']?>" <?php if($accounting_transactiondetails['users_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['email']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
          <label for="Description" class="col-md-4 control-label">Description</label> 
          <div class="col-md-8"> 
           <input type="text" name="description" value="<?php echo ($this->input->post('description') ? $this->input->post('description') : $accounting_transactiondetails['description']); ?>" class="form-control" id="description" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Vat" class="col-md-4 control-label">Vat</label> 
          <div class="col-md-8"> 
           <input type="text" name="vat" value="<?php echo ($this->input->post('vat') ? $this->input->post('vat') : $accounting_transactiondetails['vat']); ?>" class="form-control" id="vat" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Tax" class="col-md-4 control-label">Tax</label> 
          <div class="col-md-8"> 
           <input type="text" name="tax" value="<?php echo ($this->input->post('tax') ? $this->input->post('tax') : $accounting_transactiondetails['tax']); ?>" class="form-control" id="tax" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Debit" class="col-md-4 control-label">Debit</label> 
          <div class="col-md-8"> 
           <input type="text" name="debit" value="<?php echo ($this->input->post('debit') ? $this->input->post('debit') : $accounting_transactiondetails['debit']); ?>" class="form-control" id="debit" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Credit" class="col-md-4 control-label">Credit</label> 
          <div class="col-md-8"> 
           <input type="text" name="credit" value="<?php echo ($this->input->post('credit') ? $this->input->post('credit') : $accounting_transactiondetails['credit']); ?>" class="form-control" id="credit" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Currency" class="col-md-4 control-label">Currency</label> 
          <div class="col-md-8"> 
           <input type="text" name="currency" value="<?php echo ($this->input->post('currency') ? $this->input->post('currency') : $accounting_transactiondetails['currency']); ?>" class="form-control" id="currency" /> 
          </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($accounting_transactiondetails['id'])){?>Save<?php }else{?>Update<?php } ?></button>
    </div>
</div>
<?php echo form_close(); ?>
<!--End of Form to save data//-->	
<!--JQuery-->
<script>
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd", 
		changeYear: true,
		changeMonth: true,
		showOn: 'button',
		buttonText: 'Show Date',
		buttonImageOnly: true,
		buttonImage: '<?php echo base_url(); ?>public/datepicker/images/calendar.gif',
	});
</script>  			