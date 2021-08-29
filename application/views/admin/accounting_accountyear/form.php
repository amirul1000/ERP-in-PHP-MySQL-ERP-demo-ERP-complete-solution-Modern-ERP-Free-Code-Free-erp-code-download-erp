<a  href="<?php echo site_url('admin/accounting_accountyear/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php if($id<0){echo "Save";}else { echo "Update";} echo " "; echo str_replace('_',' ','Accounting_accountyear'); ?></h5>
<!--Form to save data-->
<?php echo form_open_multipart('admin/accounting_accountyear/save/'.$accounting_accountyear['id'],array("class"=>"form-horizontal")); ?>
<div class="card">
   <div class="card-body">    
        <div class="form-group"> 
          <label for="Name" class="col-md-4 control-label">Name</label> 
          <div class="col-md-8"> 
           <input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $accounting_accountyear['name']); ?>" class="form-control" id="name" /> 
          </div> 
           </div>
<div class="form-group"> 
                                       <label for="Start Date" class="col-md-4 control-label">Start Date</label> 
            <div class="col-md-8"> 
           <input type="text" name="start_date"  id="start_date"  value="<?php echo ($this->input->post('start_date') ? $this->input->post('start_date') : $accounting_accountyear['start_date']); ?>" class="form-control-static datepicker"/> 
            </div> 
           </div>
<div class="form-group"> 
                                       <label for="End Date" class="col-md-4 control-label">End Date</label> 
            <div class="col-md-8"> 
           <input type="text" name="end_date"  id="end_date"  value="<?php echo ($this->input->post('end_date') ? $this->input->post('end_date') : $accounting_accountyear['end_date']); ?>" class="form-control-static datepicker"/> 
            </div> 
           </div>
<div class="form-group"> 
          <label for="Slug" class="col-md-4 control-label">Slug</label> 
          <div class="col-md-8"> 
           <input type="text" name="slug" value="<?php echo ($this->input->post('slug') ? $this->input->post('slug') : $accounting_accountyear['slug']); ?>" class="form-control" id="slug" /> 
          </div> 
           </div>

   </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn btn-success"><?php if(empty($accounting_accountyear['id'])){?>Save<?php }else{?>Update<?php } ?></button>
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