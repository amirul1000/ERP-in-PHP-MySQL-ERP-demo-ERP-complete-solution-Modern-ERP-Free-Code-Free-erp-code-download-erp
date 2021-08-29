<a  href="<?php echo site_url('admin/accounting_journalentry/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Accounting_journalentry'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/accounting_journalentry/save/'.$accounting_journalentry['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
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
            <option value="<?=$dataArr[$i]['id']?>" <?php if($accounting_journalentry['users_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['email']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
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
            <option value="<?=$dataArr[$i]['id']?>" <?php if($accounting_journalentry['accounting_accounttype_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['name']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
                                    <label for="Accounting Accountyear" class="col-md-4 control-label">Accounting Accountyear</label> 
         <div class="col-md-8"> 
          <?php 
             $this->CI =& get_instance(); 
             $this->CI->load->database();  
             $this->CI->load->model('Accounting_accountyear_model'); 
             $dataArr = $this->CI->Accounting_accountyear_model->get_all_accounting_accountyear(); 
          ?> 
          <select name="accounting_accountyear_id"  id="accounting_accountyear_id"  class="form-control"/> 
            <option value="">--Select--</option> 
            <?php 
             for($i=0;$i<count($dataArr);$i++) 
             {  
            ?> 
            <option value="<?=$dataArr[$i]['id']?>" <?php if($accounting_journalentry['accounting_accountyear_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['name']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
          <label for="Ref No" class="col-md-4 control-label">Ref No</label> 
          <div class="col-md-8"> 
           <input type="text" name="ref_no" value="<?php echo ($this->input->post('ref_no') ? $this->input->post('ref_no') : $accounting_journalentry['ref_no']); ?>" class="form-control" id="ref_no" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Debit" class="col-md-4 control-label">Debit</label> 
          <div class="col-md-8"> 
           <input type="text" name="debit" value="<?php echo ($this->input->post('debit') ? $this->input->post('debit') : $accounting_journalentry['debit']); ?>" class="form-control" id="debit" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Credit" class="col-md-4 control-label">Credit</label> 
          <div class="col-md-8"> 
           <input type="text" name="credit" value="<?php echo ($this->input->post('credit') ? $this->input->post('credit') : $accounting_journalentry['credit']); ?>" class="form-control" id="credit" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Currency" class="col-md-4 control-label">Currency</label> 
          <div class="col-md-8"> 
           <input type="text" name="currency" value="<?php echo ($this->input->post('currency') ? $this->input->post('currency') : $accounting_journalentry['currency']); ?>" class="form-control" id="currency" /> 
          </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($accounting_journalentry['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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