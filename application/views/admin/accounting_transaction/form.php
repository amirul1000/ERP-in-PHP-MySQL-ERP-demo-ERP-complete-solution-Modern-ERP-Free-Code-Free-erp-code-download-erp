<a  href="<?php echo site_url('admin/accounting_transaction/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Accounting_transaction'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/accounting_transaction/save/'.$accounting_transaction['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
                                    <label for="Accounting Users" class="col-md-4 control-label">Accounting Users</label> 
         <div class="col-md-8"> 
          <?php 
             $this->CI =& get_instance(); 
             $this->CI->load->database();  
             $this->CI->load->model('Users_model'); 
             $dataArr = $this->CI->Users_model->get_all_users(); 
          ?> 
          <select name="accounting_users_id"  id="accounting_users_id"  class="form-control"/> 
            <option value="">--Select--</option> 
            <?php 
             for($i=0;$i<count($dataArr);$i++) 
             {  
            ?> 
            <option value="<?=$dataArr[$i]['id']?>" <?php if($accounting_transaction['accounting_users_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['email']?></option> 
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
            <option value="<?=$dataArr[$i]['id']?>" <?php if($accounting_transaction['accounting_accountyear_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['name']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
          <label for="Subject" class="col-md-4 control-label">Subject</label> 
          <div class="col-md-8"> 
           <input type="text" name="subject" value="<?php echo ($this->input->post('subject') ? $this->input->post('subject') : $accounting_transaction['subject']); ?>" class="form-control" id="subject" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Ref No" class="col-md-4 control-label">Ref No</label> 
          <div class="col-md-8"> 
           <input type="text" name="ref_no" value="<?php echo ($this->input->post('ref_no') ? $this->input->post('ref_no') : $accounting_transaction['ref_no']); ?>" class="form-control" id="ref_no" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Voucher No" class="col-md-4 control-label">Voucher No</label> 
          <div class="col-md-8"> 
           <input type="text" name="voucher_no" value="<?php echo ($this->input->post('voucher_no') ? $this->input->post('voucher_no') : $accounting_transaction['voucher_no']); ?>" class="form-control" id="voucher_no" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Post Status" class="col-md-4 control-label">Post Status</label> 
          <div class="col-md-8"> 
           <input type="text" name="post_status" value="<?php echo ($this->input->post('post_status') ? $this->input->post('post_status') : $accounting_transaction['post_status']); ?>" class="form-control" id="post_status" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Trnsaction Type" class="col-md-4 control-label">Trnsaction Type</label> 
          <div class="col-md-8"> 
           <input type="text" name="trnsaction_type" value="<?php echo ($this->input->post('trnsaction_type') ? $this->input->post('trnsaction_type') : $accounting_transaction['trnsaction_type']); ?>" class="form-control" id="trnsaction_type" /> 
          </div> 
           </div>
<div class="form-group"> 
                                    <label for="Created By Users" class="col-md-4 control-label">Created By Users</label> 
         <div class="col-md-8"> 
          <?php 
             $this->CI =& get_instance(); 
             $this->CI->load->database();  
             $this->CI->load->model('Users_model'); 
             $dataArr = $this->CI->Users_model->get_all_users(); 
          ?> 
          <select name="created_by_users_id"  id="created_by_users_id"  class="form-control"/> 
            <option value="">--Select--</option> 
            <?php 
             for($i=0;$i<count($dataArr);$i++) 
             {  
            ?> 
            <option value="<?=$dataArr[$i]['id']?>" <?php if($accounting_transaction['created_by_users_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['email']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>
<div class="form-group"> 
                                    <label for="Modified By Users" class="col-md-4 control-label">Modified By Users</label> 
         <div class="col-md-8"> 
          <?php 
             $this->CI =& get_instance(); 
             $this->CI->load->database();  
             $this->CI->load->model('Users_model'); 
             $dataArr = $this->CI->Users_model->get_all_users(); 
          ?> 
          <select name="modified_by_users_id"  id="modified_by_users_id"  class="form-control"/> 
            <option value="">--Select--</option> 
            <?php 
             for($i=0;$i<count($dataArr);$i++) 
             {  
            ?> 
            <option value="<?=$dataArr[$i]['id']?>" <?php if($accounting_transaction['modified_by_users_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['email']?></option> 
            <?php 
             } 
            ?> 
          </select> 
         </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($accounting_transaction['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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