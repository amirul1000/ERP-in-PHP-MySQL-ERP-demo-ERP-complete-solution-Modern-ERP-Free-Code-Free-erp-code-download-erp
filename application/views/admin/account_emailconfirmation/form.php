<a  href="<?php echo site_url('admin/account_emailconfirmation/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Account_emailconfirmation'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/account_emailconfirmation/save/'.$account_emailconfirmation['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
                                       <label for="Created" class="col-md-4 control-label">Created</label> 
          <div class="col-md-8"> 
           <input type="text" name="created"  id="created"  value="<?php echo ($this->input->post('created') ? $this->input->post('created') : $account_emailconfirmation['created']); ?>" class="form-control-static datepicker"/> 
          </div> 
           </div>
<div class="form-group"> 
                                       <label for="Sent" class="col-md-4 control-label">Sent</label> 
          <div class="col-md-8"> 
           <input type="text" name="sent"  id="sent"  value="<?php echo ($this->input->post('sent') ? $this->input->post('sent') : $account_emailconfirmation['sent']); ?>" class="form-control-static datepicker"/> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Key" class="col-md-4 control-label">Key</label> 
          <div class="col-md-8"> 
           <input type="text" name="key" value="<?php echo ($this->input->post('key') ? $this->input->post('key') : $account_emailconfirmation['key']); ?>" class="form-control" id="key" /> 
          </div> 
           </div>
<div class="form-group"> 
                                    <label for="Account Emailaddress" class="col-md-4 control-label">Account Emailaddress</label> 
         <div class="col-md-8"> 
          <?php 
             $this->CI =& get_instance(); 
             $this->CI->load->database();  
             $this->CI->load->model('Account_emailaddress_model'); 
             $dataArr = $this->CI->Account_emailaddress_model->get_all_account_emailaddress(); 
          ?> 
          <select name="account_emailaddress_id"  id="account_emailaddress_id"  class="form-control"/> 
            <option value="">--Select--</option> 
            <?php 
             for($i=0;$i<count($dataArr);$i++) 
             {  
            ?> 
            <option value="<?=$dataArr[$i]['id']?>" <?php if($account_emailconfirmation['account_emailaddress_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['email']?></option> 
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
        <button type="submit" class="btn btn-success"><?php if(empty($account_emailconfirmation['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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