<a  href="<?php echo site_url('admin/accounting_ledger/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Accounting_ledger'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/accounting_ledger/save/'.$accounting_ledger['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
                                    <label for="Accounting Accounttype" class="col-md-4 control-label">Accounting Accounttype</label> 
         <div class="col-md-8"> 
          <?php 
             $this->CI =& get_instance(); 
             $this->CI->load->database();  
             $this->CI->load->model('Accounting_accounttype_model'); 
             $dataArr = $this->CI->Accounting_accounttype_model->get_all_accounting_accounttype(); 
          ?> 
          <select name="accounting_accounttype_id"  id="accounting_accounttype_id"  class="form-control"/> 
            <option value="">--Select--</option> 
            <?php 
             for($i=0;$i<count($dataArr);$i++) 
             {  
            ?> 
            <option value="<?=$dataArr[$i]['id']?>" <?php if($accounting_ledger['accounting_accounttype_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['name']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
          <label for="Code" class="col-md-4 control-label">Code</label> 
          <div class="col-md-8"> 
           <input type="text" name="code" value="<?php echo ($this->input->post('code') ? $this->input->post('code') : $accounting_ledger['code']); ?>" class="form-control" id="code" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Name" class="col-md-4 control-label">Name</label> 
          <div class="col-md-8"> 
           <input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $accounting_ledger['name']); ?>" class="form-control" id="name" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Description" class="col-md-4 control-label">Description</label> 
          <div class="col-md-8"> 
           <input type="text" name="description" value="<?php echo ($this->input->post('description') ? $this->input->post('description') : $accounting_ledger['description']); ?>" class="form-control" id="description" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Total Debit" class="col-md-4 control-label">Total Debit</label> 
          <div class="col-md-8"> 
           <input type="text" name="total_debit" value="<?php echo ($this->input->post('total_debit') ? $this->input->post('total_debit') : $accounting_ledger['total_debit']); ?>" class="form-control" id="total_debit" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Total Credit" class="col-md-4 control-label">Total Credit</label> 
          <div class="col-md-8"> 
           <input type="text" name="total_credit" value="<?php echo ($this->input->post('total_credit') ? $this->input->post('total_credit') : $accounting_ledger['total_credit']); ?>" class="form-control" id="total_credit" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Balance" class="col-md-4 control-label">Balance</label> 
          <div class="col-md-8"> 
           <input type="text" name="balance" value="<?php echo ($this->input->post('balance') ? $this->input->post('balance') : $accounting_ledger['balance']); ?>" class="form-control" id="balance" /> 
          </div> 
           </div>
<div class="form-group"> 
                                       <label for="Last Update Date" class="col-md-4 control-label">Last Update Date</label> 
            <div class="col-md-8"> 
           <input type="text" name="last_update_date"  id="last_update_date"  value="<?php echo ($this->input->post('last_update_date') ? $this->input->post('last_update_date') : $accounting_ledger['last_update_date']); ?>" class="form-control-static datepicker"/> 
            </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($accounting_ledger['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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