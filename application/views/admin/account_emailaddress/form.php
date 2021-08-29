<a  href="<?php echo site_url('admin/account_emailaddress/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Account_emailaddress'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/account_emailaddress/save/'.$account_emailaddress['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
          <label for="Email" class="col-md-4 control-label">Email</label> 
          <div class="col-md-8"> 
           <input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $account_emailaddress['email']); ?>" class="form-control" id="email" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Verified" class="col-md-4 control-label">Verified</label> 
          <div class="col-md-8"> 
           <input type="text" name="verified" value="<?php echo ($this->input->post('verified') ? $this->input->post('verified') : $account_emailaddress['verified']); ?>" class="form-control" id="verified" /> 
          </div> 
           </div>
<div class="form-group"> 
          <label for="Primary" class="col-md-4 control-label">Primary</label> 
          <div class="col-md-8"> 
           <input type="text" name="primary" value="<?php echo ($this->input->post('primary') ? $this->input->post('primary') : $account_emailaddress['primary']); ?>" class="form-control" id="primary" /> 
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
            <option value="<?=$dataArr[$i]['id']?>" <?php if($account_emailaddress['users_id']==$dataArr[$i]['id']){ echo "selected";} ?>><?=$dataArr[$i]['email']?></option> 
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
        <button type="submit" class="btn btn-success"><?php if(empty($account_emailaddress['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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